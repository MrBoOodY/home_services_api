<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\VisitRequestController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | These routes related to Authentication
    |
    */
Route::


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
