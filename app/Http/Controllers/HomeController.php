<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim();

        $users = User::when($search->isNotEmpty(), function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })->orderBy('email')->get();

        if ($request->ajax()) {
            return view('users._list', ['users' => $users]);
        }

        return view('welcome', ['users' => $users]);
    }
}
