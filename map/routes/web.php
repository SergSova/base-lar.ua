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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Role
Route::get('role/set/{user}/{role}', 'Auth\AuthController@setRole')->name('setRole')->middleware('role:super-admin');
Route::get('role/unset/{user}/{role}', 'Auth\AuthController@unsetRole')->name('unsetRole')->middleware('role:super-admin');


// OAuth Routes
Route::get('oauth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('oauth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
