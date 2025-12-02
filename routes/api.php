<?php

use App\Http\Controllers\Api\Frontend\UserController;
use App\Http\Controllers\Api\Frontend\UserInfoController;
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

// TODO: V1

Route::prefix('v1/')->group(function () {

    Route::prefix('users')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::put('/update/{userId}/', 'update');
            Route::get('/{userId}', 'show');
            Route::get('/destroy/{userId}', 'destroy');

        });
    Route::prefix('user-info')
        ->controller(UserInfoController::class)
        ->group(function () {
            Route::put('/update/{userId}', 'update');
            Route::get('/{userId}', 'show');
        });
});
