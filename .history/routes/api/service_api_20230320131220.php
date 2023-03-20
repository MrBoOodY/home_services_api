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


/*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | These routes related to Services
    |
    */

Route::resource('/services', Servc::class);
