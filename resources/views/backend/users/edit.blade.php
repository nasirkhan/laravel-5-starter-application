@extends('backend.layouts.master')

<?php
$module_name_singular = str_singular($module_name);
?>

@section('title')

{{ $title }}

@endsection


@section('page_heading')

{{ ucfirst($module_name) }} {{ $module_action }}

@endsection


@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">

        <p>
            <a href="{{ route("admin.$module_name.index") }}" class="btn btn-success">
                <i class="fa fa-users"></i> {{ ucfirst($module_name_singular) }} List
            </a>
        </p>

        {!! Form::model($$module_name_singular, ['method' => 'PATCH', 'url' => ["admin/$module_name", $$module_name_singular->id], 'files' => true, 'class' => 'form-horizontal']) !!}

        {!! csrf_field() !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Name' , ['class' => 'col-sm-2 control-label']) !!}   
            <div class="col-sm-10">
                {!! Form::text('name', old('name') , ['class' => 'form-control']) !!} 
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email' , ['class' => 'col-sm-2 control-label']) !!}   
            <div class="col-sm-10">
                {!! Form::text('email', old('email') , ['class' => 'form-control']) !!} 
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('roles_list[]', 'Roles' , ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('roles_list[]', $roles, null, ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::button("<i class=\"fa fa-plus\"></i> $module_action " . $module_name_singular . "", ['class' => 'btn btn-primary', 'type'=>'submit']) !!}
            </div>
        </div>
            

        {!! Form::close() !!}
        
    </div>
</div>

@endsection