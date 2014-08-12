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

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('register',function(){
	return View::make('register');
});
Route::get('thankyou',function(){
	return View::make('thankyou');
});

Route::post('doRegister',array('uses'=>'HomeController@doRegister'));

Route::get('profile',array('as'=>'myprofile',function(){
	return View::make('myprofile');
}));

Route::get('form',function(){
	return View::make('form');
});

Route::get('fail',function(){
	return View::make('fail');
});
Route::get('success',function(){
	return View::make('success');
});
Route::post('regform',array('before'=>'csrf',function()
{
	return 'received';
} ));

Route::post('login',array('uses'=>'HomeController@doLogin'));
