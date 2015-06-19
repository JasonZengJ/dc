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



//Route::get('home', 'IndexController@index');
Route::get('/', 'IndexController@index');

//Route::get('user/{user}',function(diancan\User $user) {
//
//	return view("welcome",['user' => $user]);
//
//})->where(['name' => '[a-z]+',]);

//Route::group(['middleware' => 'mymid'], function()
//{
//	Route::get('/welcome', 'WelcomeController@index');
//
//});

Route::group(['prefix' => 'admin','namespace'],function(){
	Route::resources([
		'/' => 'Admin\IndexController'
	]);
	Route::controllers([
		'/' => 'Admin\IndexController'
	]);
});

Route::resource('user','UsersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'user'=> 'UsersController',
]);
