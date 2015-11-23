<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
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
    public function index()
    {
        $title = $this->title;        
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        
        $page_heading = "All Users";
        
        $$module_name = User::all();
        
        return view('backend.users.index', 
                compact('title', 'page_heading', 'module_icon', "module_name", "$module_name"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
