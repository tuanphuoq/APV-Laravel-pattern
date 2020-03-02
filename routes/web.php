<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.login');
});


Route::get('/login', function() {
    return view('layouts.login');
})->name('login');

//login and register
Route::post('/register', 'UserController@register')->name('register');
Route::post('/loginPost', 'UserController@login')->name('loginPost');
Route::get('/checkEmail', 'UserController@checkEmail')->name('checkEmail');

Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', function() {
    return view('layouts.home');
	})->name('home');
});

//upload file to change avatar
Route::post('upFile', 'UserController@changeAvatar')->name('upFile');
