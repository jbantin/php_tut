<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/home.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#4b4b48] dark:text-[#c5c5c1] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="w-full max-w-xl mb-6">
            <h1 class="text-2xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}</h1>
            <p class="text-gray-500 dark:text-gray-400">You are logged in as {{ auth()->user()->email }}.</p>
        </div>
        <div class="w-full max-w-xl">
            <h1 class="text-2xl font-semibold mb-4">Users</h1>
            <form action="{{ route('home') }}" method="GET">
                <input type="text" name="search" id="user-search" placeholder="Search users..." value="{{ request('search') }}" autocomplete="off" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </form>
            <div id="user-list" class="flex flex-col gap-2">
                @include('users._list')
            </div>
        </div>

        <form action="{{ route('users.store') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                Create User
            </button>
        </form>
        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="inline-block bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                Logout
            </button>
        </form>
    </body>
</html>
