<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/{user}', 'show')->name('show');
    Route::post('/', 'store')->name('store');
    Route::delete('/{user}', 'destroy')->name('destroy');
});
