@extends('frontend.layouts.master')


@section('content')

<div class="login-box">
    <div class="login-box-body">
        <p class="lead login-box-msg">Change Password</p>     
        
        {!! Form::open(['route' => ['password.change'], 'class' => '', 'role' => 'form']) !!}
            <div class="form-group has-feedback">
                {!! Form::label('old_password', 'old_password', ['class' => '']) !!}
                {!! Form::input('password', 'old_password', old('email'), ['class' => 'form-control', 'placeholder' => "Old Password"]) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        
            <div class="form-group has-feedback">
                {!! Form::label('password', 'new_password', ['class' => '']) !!}
                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => "New Password"]) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">  
                {!! Form::label('password_confirmation', 'new_password_confirmation', ['class' => '']) !!}
                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => "Retype New Password"]) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">    
                    &nbsp;                       
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-check"></i> Update</button>
                </div><!-- /.col -->
            </div>
        {!! Form::close() !!}


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@endsection