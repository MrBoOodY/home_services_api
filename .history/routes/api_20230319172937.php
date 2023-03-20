<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\VisitRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Visits
    |--------------------------------------------------------------------------
    |
    | These routes related to Visits
    |
    */
    Route::resource('/visits', VisitController::class);

    /*
    |--------------------------------------------------------------------------
    | Visit Requests
    |--------------------------------------------------------------------------
    |
    | These routes related to Visits
    |
    */
    Route::resource('/visit_requests', VisitRequestController::class);
});

/*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | These routes related to Authentication
    |
    */
Route::prefix('/user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
