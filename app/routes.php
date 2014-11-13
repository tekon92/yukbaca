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
Route::resource('books', 'BookController');
Route::resource('backed', 'BackedController');
Route::resource('index', 'IndexController');
Route::resource('authors', 'AuthorController');


Route::any("/",[
    "as" => "index/index",
    "uses" => "indexController@index"
]);
Route::get("category/index/{id}", [
    "as" => "category/index",
    "uses" => "CategoryController@indexAction"
]);

Route::any("order/index", [
    "as" => "order/index",
    "uses" => "OrderController@indexAction"
]);
// cart
// Route::when('books', 'auth');
Route::get('/cart', array('before'=>'auth', 'as' => 'cart', 'uses' => 'CartController@getIndex'));
Route::post('/cart/add', array('before' => 'auth','uses' => 'CartController@postAddToCart'));
Route::get('/cart/delete/{id}', array('before' => 'auth', 'as' => 'delete_book_from_cart', 'uses' => 'CartController@getDelete'));

// order
Route::get('/order', array('before' => 'auth.basic', 'uses' => 'OrderController@postOrder'));
Route::post('/user/order', array('before' => 'auth.basic', 'uses' => 'OrderController@getIndex'));