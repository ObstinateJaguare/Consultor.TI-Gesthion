<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
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