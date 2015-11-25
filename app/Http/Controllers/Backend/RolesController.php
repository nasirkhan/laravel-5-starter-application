<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;

class RolesController extends Controller {

    public function __construct() {

        $this->module_name = 'roles';
        $this->module_icon = 'user-secret';
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

        $page_heading = "All " . $module_name;

        $$module_name = Role::paginate(5);

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

        $permissions = Permission::all();

        return view("backend.$module_name.create", compact(
                        'title', 'module_name', 'module_icon', 'module_action', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request) {
        $module_name = $this->module_name;

        Role::create($request->all());

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

        $$module_name_singular = Role::findOrFail($id);

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

        $$module_name_singular = Role::findOrFail($id);

        $permissions = Permission::all();

        return view("backend.$module_name.edit", compact('module_name', "$module_name_singular", 'module_icon', 'module_action', 'title', "permissions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id) {
return $request->all();
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);

        $module_name_singular = Role::findOrFail($id);

        $module_name_singular->update($request->all());

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

}
