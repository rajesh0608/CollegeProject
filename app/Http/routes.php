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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('index');
});

Route::get('signUp', 'AdminController@signUp');   // send for form purpose
Route::post('signMe', 'AdminController@signMe');  // submit form function do here

Route::any('adminLogin',['uses'=> 'AdminController@adminLogin', 'as' => 'adminLogin']);
Route::post('ckLogin', ['uses' => 'AdminController@ckLogin', 'as' => 'ckLogin']);