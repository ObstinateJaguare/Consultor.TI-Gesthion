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
//cuentas
Route::get('/',[CuentaController::class, 'index']);
Route::post('/cuentas/create',[CuentaController::class, 'store']);
Route::get('/cuentas/list',[CuentaController::class, 'showAll']);
Route::get('/cuentas/get-cuentas/{id}',[CuentaController::class, 'show']);
Route::update('/cuentas/update',[CuentaController::class, 'update']);
