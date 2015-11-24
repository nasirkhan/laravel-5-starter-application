<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;
use App\Role;

class RolesController extends Controller {
    
    public function __construct() {

        $this->module_name = 'roles';
        $this->module_icon = 'roles';
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

        return view("backend.$module_name.create", compact('title', 'module_name', 'module_icon', 'module_action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
