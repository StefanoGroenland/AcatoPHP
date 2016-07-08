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
    return view('registeren');
});
Route::get('/registeren-gelukt', function () {
    return view('registeren-gelukt');
});
Route::post('/registeren', 'UserController@registerUser');
