<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\SensorsController; 
use App\Http\Controllers\SensorDataController; 


// Rute untuk mengelola pengguna
Route::apiResource('users', UsersController::class);
Route::apiResource('sensors', SensorsController::class);
Route::apiResource('sensordata', SensorDataController::class);


