<?php


/*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | These routes related to Authentication
    |
    */

use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
