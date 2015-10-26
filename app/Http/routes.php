<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::group(['namespace' => 'Auth'], function () {
//    Route::group(['middleware' => 'auth'], function () {
//        Route::get('auth/logout', 'AuthController@getLogout');
//        Route::get('auth/password/change', 'PasswordController@getChangePassword');
//        Route::post('auth/password/change', ['as' => 'password.change', 'uses' => 'PasswordController@postChangePassword']);
//    });
//
//    Route::group(['middleware' => 'guest'], function () {
//        Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AuthController@loginThirdParty']);
//        Route::get('account/confirm/{token}', ['as' => 'account.confirm', 'uses' => 'AuthController@confirmAccount']);
//        Route::get('account/confirm/resend/{user_id}', ['as' => 'account.confirm.resend', 'uses' => 'AuthController@resendConfirmationEmail']);
//
//        Route::controller('auth', 'AuthController');
//        Route::controller('password', 'PasswordController');
//    });
//});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
});

