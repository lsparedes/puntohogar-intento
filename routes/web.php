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
    return view('landing');
});

Auth::routes();

Route::post('/putlogin' , 'Auth\LoginController@loginModal' )->name('login.modal');
Route::post('/putregister' , 'Auth\RegisterController@create' )->name('register.modal');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/propiedades','PropiedadesController');
