<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\SensorsController; 
use App\Http\Controllers\SensorDataController; 
use App\Http\Controllers\ProxySensorDataController; 



// Rute untuk mengelola pengguna
Route::apiResource('users', UsersController::class);
Route::apiResource('sensors', SensorsController::class);
Route::apiResource('sensordata', SensorDataController::class);

// routes/api.php

// routes/api.php


Route::get('/proxy/sensordata', [ProxySensorDataController::class, 'getSensorData']);




