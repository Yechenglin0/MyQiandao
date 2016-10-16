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



	// Route::get('/sign', 'SignController@sign');
	
	// Route::get('/test','SignController@test');


Route::group(['middleware' => \App\Http\Middleware\WeixinAuthenticate::class],function() {
	Route::get('/', function () {
	    return view('qiandao');
	});
	Route::get('/showList','ListController@showList');
	Route::get('/sign', 'SignController@sign');
	
});