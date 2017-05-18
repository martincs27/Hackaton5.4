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
    return view('crud');
});
Route::resource('/equipos','EquipoController'   ,[ 'except'=>['edit','create'] ]);
Route::get('/equipos/mant/{id}', 'EquipoController@mant');
Route::get('/equipos/inc/{id}', 'EquipoController@inc');
Route::get('/newinc/{id}', 'IncidenteController@equipoinc');
Route::post('/newman/{id}', 'MantenimientoController@equipoman');
//Route::resource('/incidentes','IncidenteController',[ 'except'=>['edit','create'] ]);
//Route::resource('/mantenimientos','MantenimientoController',[ 'except'=>['edit','create'] ]);