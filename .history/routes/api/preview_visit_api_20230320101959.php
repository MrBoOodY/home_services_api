<?php

use App\Http\Controllers\PreviewVisitController;
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

Route::middleware(['auth:api'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Preview Visits
    |--------------------------------------------------------------------------
    |
    | These routes related to Preview Visits
    |
    */
    Route::resource('/preview_visits', PreviewVisitController::class);
});
