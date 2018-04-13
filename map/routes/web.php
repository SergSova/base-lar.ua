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

use Illuminate\Support\Facades\Route;

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
Route::group(
    ['middleware' => ['role:super-admin']],
    function () {
        Route::get('role/set/{user}/{role}', 'Auth\AuthController@setRole')->name('setRole');
        Route::get('role/unset/{user}/{role}', 'Auth\AuthController@unsetRole')->name('unsetRole');
        Route::delete('user/destroy/{user}', 'Auth\AuthController@destroyUser')->name('destroyUser');

        Route::get('user/status/{user}/{status}','Auth\AuthController@userStatus')->name('userStatus');
    }
);

// OAuth Routes
Route::get('oauth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('oauth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
