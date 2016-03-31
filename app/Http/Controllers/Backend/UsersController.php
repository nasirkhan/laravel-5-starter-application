<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Flash;
use App\User;
use App\Http\Requests;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use App\Role;

class UsersController extends Controller {

    public function __construct() {

        $this->module_name = 'users';
        $this->module_icon = 'users';
        $this->title = "Application Admin Dashboard";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = $this->title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;

        $page_heading = "All Users";

        $$module_name = User::paginate(5);

        return view("backend.$module_name.index", compact('title', 'page_heading', 'module_icon', "module_name", "$module_name"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $title = $this->title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_action = "Create";

        $roles = Role::lists('name', 'id');

        return view("backend.$module_name.create", compact('title', 'module_name', 'module_icon', 'module_action', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $module_name = $this->module_name;

        $$module_name_singular = User::create($request->except('roles_list'));
        $$module_name_singular->permissions()->attach($request->input('roles_list'));

        return redirect("admin/$module_name")->with('flash_success', "$module_name added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $title = $this->title;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Details";

        $$module_name_singular = User::findOrFail($id);

        return view("backend.$module_name.show", compact('module_name', "$module_name_singular", 'module_icon', 'module_action', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $title = $this->title;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Edit";

        $roles = Role::lists('name', 'id');

        $$module_name_singular = User::findOrFail($id);

        return view("backend.$module_name.edit", compact('module_name', "$module_name_singular", 'module_icon', 'module_action', 'title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);

        $$module_name_singular = User::findOrFail($id);
        $$module_name_singular->update($request->except('roles_list'));

        if ($request->input('roles_list') === null) {
            $roles = array();
            $$module_name_singular->roles()->sync($roles);
        } else {
            $$module_name_singular->roles()->sync($request->input('roles_list'));
        }

        return redirect("admin/$module_name")->with('flash_success', "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getChangePassword() {
        return view('auth.change-password');
    }

    /**
     * @param ChangePasswordRequest $request
     * @return mixed
     */
    public function postChangePassword(ChangePasswordRequest $request) {

        // get the current user
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {

            // assign new password 
            $user->password = $request->password;
            
            // save password
            $user->save();
            
            // flash message
            Flash::message('The user password has been updated!');

            return redirect()->route('backend.dashboard');
        } else {
            // flash message
            Flash::error('Old password is not verified!');
            
            return redirect()->back()->withInput();
        }

    }

}
