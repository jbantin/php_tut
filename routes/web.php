<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::orderBy('name')->get(),
    ]);
});

Route::get('/users/create', function () {
    User::factory()->create();

    return redirect('/');
})->name('users.create');
