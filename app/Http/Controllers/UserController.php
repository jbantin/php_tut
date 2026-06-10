<?php

namespace App\Http\Controllers;

use App\Mail\UserActivityNotification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function store(): RedirectResponse
    {
        $user = User::factory()->create();

        Mail::to(config('mail.admin_address'))
            ->send(new UserActivityNotification($user, 'created'));

        return redirect()->route('home');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        Mail::to(config('mail.admin_address'))
            ->send(new UserActivityNotification($user, 'deleted'));

        return redirect()->route('home');
    }
}
