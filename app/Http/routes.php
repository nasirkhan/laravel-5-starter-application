<?php

/**
 * Frontend Routes
 * Namespaces indicate folder structure
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
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
        
        // Profiles routes
        Route::resource('profiles', 'ProfilesController');
    });
});

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');

// Password change
Route::get('auth/password/change', ['uses' => 'Backend\UsersController@getChangePassword', 'as' => 'password.change']);
Route::post('auth/password/change', ['uses' => 'Backend\UsersController@postChangePassword', 'as' => 'password.change']);

// Password reset link request routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Socialite routes
Route::get('auth/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
