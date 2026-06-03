<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::orderBy('name')->pluck('name'),
    ]);
});

Route::get('/users/create', function () {
    User::factory()->create();

    return redirect('/');
})->name('users.create');
