<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::when('*', 'csrf', array('post', 'put', 'delete'));

Route::get('/', 'PageController@home');
Route::get('stats', 'PageController@showStats');
Route::get('render', 'PageController@renderStats');

// User Routes
Route::post('users/create', 'UsersController@create');
Route::post('users/login', 'UsersController@doLogin');
Route::post('users/manage', 'UsersController@doManage');
Route::get('users/manage', 'UsersController@manage');

Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
