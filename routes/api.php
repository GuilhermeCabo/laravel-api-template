<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace('Users')->group(function () {

    Route::apiResource("sessions", "SessionsController")->only([
        "store"
    ]);

    Route::apiResource("users", "UsersController")->except([
        "update", "delete"
    ]);

    Route::middleware("auth:sanctum")->group(function () {
        Route::apiResource("users", "UsersController")->only([
            "update", "delete"
        ]);
    });
});

