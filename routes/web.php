<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/{user}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login')->middleware('guest');
    Route::post('/login', 'store')->name('login.store')->middleware('throttle:5,1');
    Route::post('/logout', 'destroy')->name('logout')->middleware('auth');
});
