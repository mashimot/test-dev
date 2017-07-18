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
    return view('welcome');
});
Route::get('/carros', 'CarroController@index');

Route::get('api/carros', 'CarroController@getCars');
Route::get('api/carros/{id}', 'CarroController@getCar');

Route::get('api/marcas', 'CarroController@getMarcas');

Route::post('api/carros', 'CarroController@store');
Route::put('api/carros/{id}', 'CarroController@update');
Route::delete('api/carros/{id}', 'CarroController@destroy');
