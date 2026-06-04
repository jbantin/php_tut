<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function store(): RedirectResponse
    {
        User::factory()->create();

        return redirect()->route('home');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('home');
    }
}
