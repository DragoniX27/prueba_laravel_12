<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::apiResource('subscriptions', \App\Http\Controllers\Api\SubscriptionController::class);
    Route::apiResource('companies', \App\Http\Controllers\Api\CompanieController::class);
    Route::apiResource('plans', \App\Http\Controllers\Api\PlanController::class);
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
});