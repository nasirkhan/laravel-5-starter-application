<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserProvider;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to($this->redirectPath());
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
        if ($authUser = User::where('email', $socialUser->getEmail())->first()) {
            return $authUser;
        }

        $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail()
        ]);
        
        $user_data = $user->attributesToArray();
        $userId = $user_data ['id'];
        
//        dd($user_data ['id']);
        
        UserProvider::create([
                    'user_id' => $userId,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'provider' => $provider                    
        ]);
        
        return $user;
    }

//    public function handleProviderCallback($provider) {
//        //notice we are not doing any validation, you should do it
//
//        try {
//            $user = Socialite::driver($provider)->user();
//        } catch (Exception $e) {
//            return Redirect::to($this->redirectPath());
//        }
//
//        // stroing data to our use table and logging them in
//        $data = [
//            'name' => $user->getName(),
//            'email' => $user->getEmail()
//        ];
//
//        Auth::login(User::firstOrCreate($data));
//
//        //after login redirecting to home page
//        return redirect($this->redirectPath());
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

}
