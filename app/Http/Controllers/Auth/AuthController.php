<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Mail;
use Flash;
use App\User;
use Validator;
use App\UserProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationsRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    private $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);

        $this->redirectPath = route('home');
    }

    public function getRegister() {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(RegistrationsRequest $request) {

        // Create user
        $user = User::create($request->all());

        // email the confirmation link
        $this->sendEmailConfirmationTo($user);

        // flash message
        Flash::message('Please confirm your email address.!');

        // redirect
        return redirect($this->redirectPath());
    }

    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token) {
        User::whereToken($token)->firstOrFail()->confirmEmail();

        flash('You are now confirmed. Please login.');

        return redirect('auth/login');
    }

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($socialUser, $provider) {
        if ($authUser = UserProvider::where('provider_id', $socialUser->getId())->first()) {

            $authUser = User::findOrFail($authUser->user->id);

            return $authUser;
        } else if ($authUser = User::where('email', $socialUser->getEmail())->first()) {

            UserProvider::create([
                'user_id' => $authUser->id,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'provider' => $provider
            ]);

            return $authUser;
        } else {

            $user = User::create([
                        'name' => $socialUser->getName(),
                        'email' => $socialUser->getEmail()
            ]);

            UserProvider::create([
                'user_id' => $user->id,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'provider' => $provider
            ]);

            return $user;
        }
    }

    protected function sendEmailConfirmationTo($user) {
        Mail::send('emails.confirm_email', ['user' => $user], function ($m) use ($user) {
            $m->from(config('settings.admin.email'), config('settings.admin.name'));

            $m->to($user->email, $user->name)->subject('Please Confirm Your Email! - ' . config('settings.app_name'));
        });
    }

}
