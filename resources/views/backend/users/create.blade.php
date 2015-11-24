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
                <i class="fa fa-{{ $module_icon }}"></i> {{ ucfirst($module_name_singular) }} List
            </a>
        </p>

        <form method="POST" action="{{ route('admin.users.index') }}" class="form-horizontal">

            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password Confirmation</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">{{ $module_action }} </button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection