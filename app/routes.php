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

// Route::get('/', function()
// {
// 	return View::make('index');
// });
//

// Confide routes
Route::get('users/create', array('as' => 'users.signup', 'uses' => 'UsersController@create'));
Route::post('users', array('as' => 'users.store', 'uses' => 'UsersController@store'));
Route::get('users/login', array('as' => 'users.login', 'uses' => 'UsersController@login'));
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', array('as' => 'users.forgot', 'uses' => 'UsersController@forgotPassword'));
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', array('as' => 'users.reset', 'uses' => 'UsersController@doResetPassword'));
Route::get('users/logout', array('as' => 'users.logout', 'uses' => 'UsersController@logout'));

// project route
Route::resource('projects', 'ProjectController');

Route::any("/",[
    "as" => "index/index",
    "uses" => "indexController@indexAction"
]);
Route::any("category/index", [
    "as" => "category/index",
    "uses" => "CategoryController@indexAction"
]);

Route::any("order/index", [
    "as" => "order/index",
    "uses" => "OrderController@indexAction"
]);
