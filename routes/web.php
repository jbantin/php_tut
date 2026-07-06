<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('register.store')->middleware('throttle:5,1');
});
