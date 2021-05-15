<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::middleware('auth:api')->group(function () {
    Route::apiResource('cars', CarController::class);
    Route::apiResource('car-models', CarModelController::class);
});

Route::middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});
