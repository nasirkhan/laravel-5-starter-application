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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
    Route::get('home', ['as' => 'home', 'uses' => 'FrontendController@index']);
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        
        Route::get('/', ['as' => 'backend.dashboard', 'uses' => 'DashboardController@index']);
        Route::get('users', ['uses' => 'UsersController@index']);
        
    });
});

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Socialite routes
//Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');