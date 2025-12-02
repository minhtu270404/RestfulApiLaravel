<?php

use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth/')
->name('google.')
->controller(AdminAuthController::class)
->group(function(){

Route::get('/google', 'GoogleLogin')->name('login');
Route::get('/google/callback',   'handleGoogleCallback')->name('callback');
});






//google.login
//google.callback
//auth/google/login
//auth/google/callback

require __DIR__.'/auth.php';
