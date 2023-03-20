<?php
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
    | Visit Requests
    |--------------------------------------------------------------------------
    |
    | These routes related to Visit Requests
    |
    */
    Route::resource('/visit_requests', VisitRequestController::class);

    /*
    |--------------------------------------------------------------------------
    | Preview Visits
    |--------------------------------------------------------------------------
    |
    | These routes related to Preview Visits
    |
    */
    Route::resource('/preview_visits', VisitRequestController::class);

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    |
    | These routes related to User
    |
    */
    Route::resource('/user', UserController::class);
});