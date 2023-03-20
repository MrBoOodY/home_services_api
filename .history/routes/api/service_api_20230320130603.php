<?php

use App\Http\Controllers\CategoryController;
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

Route::middleware(['auth:api', 'auth.session'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Visit Requests
    |--------------------------------------------------------------------------
    |
    | These routes related to Visit Requests
    |
    */
    Route::resource('/services', CategoryController::class);
 