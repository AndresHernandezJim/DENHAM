<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','denham@index');
Route::get('/ventas','denham@ventas');
Route::get('/productos','denham@productos');
Route::get('/categorias','denham@categorias');
Route::get('/clientes','denham@clientes');

// Consultas ajax
Route::post('/consulta/venta','denham@query_venta');
Route::post('/consulta/producto','denham@query_producto');
Route::post('/consulta/cliente','denham@query_cliente');
