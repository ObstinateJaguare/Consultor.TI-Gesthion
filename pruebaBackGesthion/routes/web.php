<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
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
//home
Route::get('/',[CuentaController::class, 'index']);
//cuentas
Route::post('/cuentas/create',[CuentaController::class, 'store']);
Route::get('/cuentas/list',[CuentaController::class, 'showAll']);
Route::get('/cuentas/get-cuentas/{id}',[CuentaController::class, 'show']);
Route::update('/cuentas/update',[CuentaController::class, 'update']);

//productos
Route::post('/productos/create',[CuentaController::class, 'store']);
Route::get('/productos/list',[CuentaController::class, 'showAll']);
Route::get('/productos/get-producto/{id}',[CuentaController::class, 'show']);
Route::update('/productos/update',[CuentaController::class, 'update']);

//pedidos
Route::post('/pedidos/create',[CuentaController::class, 'store']);
Route::get('/pedidos/list',[CuentaController::class, 'showAll']);
Route::get('/pedidos/get-pedido/{id}',[CuentaController::class, 'show']);
Route::update('/pedidos/update',[CuentaController::class, 'update']);

