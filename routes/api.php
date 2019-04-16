<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/', 'Estoque\EstoqueController@store');
Route::get('/', 'Estoque\EstoqueController@showAllWithPagination');
Route::get('/{idRefri}', 'Estoque\EstoqueController@showRefri');
Route::get('/excluir/{idRefri}', 'Estoque\EstoqueController@excluirRefri');
Route::post('/{idRefri}', 'Estoque\EstoqueController@update');

