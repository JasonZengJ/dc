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

Route::get('/home',function(){
	echo "fuck";
});

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'admin','namespace'],function(){


	Route::group(['middleware' => ['adminCheck']], function()
	{

		Route::controller('statistics','Admin\StatisticsController');
		Route::resources([
			'/' => 'Admin\IndexController',
			'orders' => 'Admin\OrderController',
			'dishes' => 'Admin\DishesController',
			'users'  => 'Admin\UsersController',
			'dishCates' => 'Admin\DishCateController'
		]);
		Route::controllers([
			'/' => 'Admin\IndexController',

		]);

	});

});

Route::group(['middleware' => ['userCheck']], function()
{

	Route::resources([
		'user'  => 'UsersController',
		'order' => 'OrderController'
	]);

	Route::controllers([
		'user'=> 'UsersController'
	]);

});

Route::resources([
	'push' => 'PushController',
	'api'  => 'mobile\MobileApiController'
]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'printer'  => 'PrintController',
	'api' => 'mobile\MobileApiController',

]);



