<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionsRequest;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->module_name = 'permissions';
        $this->module_icon = 'key';
        $this->title = "Application Admin Dashboard";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;

        $page_heading = "All " . $module_name;

        $$module_name = Permission::paginate(5);

        return view("backend.$module_name.index", compact('title', 'page_heading', 'module_icon', "module_name", "$module_name"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function store(PermissionsRequest $request)
    {
        $module_name = $this->module_name;

        Permission::create($request->all());

        return redirect("admin/$module_name")->with('flash_success', "$module_name added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = $this->title;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Details";

        $$module_name_singular = Permission::findOrFail($id);

        return view("backend.$module_name.show", compact('module_name', "$module_name_singular", 'module_icon', 'module_action', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Edit";

        $$module_name_singular = Permission::findOrFail($id);

        return view("backend.$module_name.edit", compact('module_name', "$module_name_singular", 'module_icon', 'module_action', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionsRequest $request, $id)
    {
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);

        $module_name_singular = Permission::findOrFail($id);

        $module_name_singular->update($request->all());

        return redirect("admin/$module_name")->with('flash_success', "Update successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
