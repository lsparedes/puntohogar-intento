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
Route::get('propiedades/{id}', ['as'=> 'propiedadeshow', 'uses' => 'PropiedadesController@vermas']);
Route::resource('/propiedades','PropiedadesController');

Route::get('propiedades/update/{id}', 'PropiedadesController@updateState')->name('update'); //pasa una publicacion a aceptada
Route::get('propiedades/down/{id}', 'PropiedadesController@downState')->name('down'); //Pasa una publicacion a rechazada
Route::get('formEdit/{id}', 'PropiedadesController@callFormEdit')->name('editpropiedad'); //Formulario de edicion cuando la publicacion fue rechazada
Route::post('propiedades/editAll/{id}', 'PropiedadesController@editAll')->name('editAll'); //Actualiza la propiedad
