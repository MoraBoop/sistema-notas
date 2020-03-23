<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/nota', 'PageController@nota')->name('nota');

Route::get('/nota/{id}', 'PageController@detalle')->name('notas.detalle');

Route::post('/nota', 'PageController@crear')->name('notas.crear');

Route::get('/nota/editar/{id}', 'PageController@editar')->name('notas.editar');

Route::put('/nota/editar/{id}', 'PageController@update')->name('notas.update');

Route::delete('/nota/{id}', 'PageController@eliminar')->name('notas.eliminar');