<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('plans', \App\Http\Controllers\Api\PlanController::class);
        Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
        Route::apiResource('companies', \App\Http\Controllers\Api\CompanieController::class);
    });    
});