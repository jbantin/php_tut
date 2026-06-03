<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::orderBy('email')->get(),
    ]);
});

Route::get('/users/create', function () {
    User::factory()->create();

    return redirect('/');
})->name('users.create');

Route::get('/users/delete/{user}', function (User $user) {
    $user->delete();

    return redirect('/');
})->name('users.delete');
