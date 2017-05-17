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
Route::get('/hackaton','EquipoController@index');
Route::resource('/equipos','EquipoController'   ,[ 'except'=>['edit','create'] ]);
Route::resource('/incidentes','IncidenteController',[ 'except'=>['edit','create'] ]);
Route::resource('/mantenimientos','MantenimientoController',[ 'except'=>['edit','create'] ]);