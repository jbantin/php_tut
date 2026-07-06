<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#4b4b48] dark:text-[#c5c5c1] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="w-full max-w-xl">
            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="email" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="email" required>
                @error('email')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror
                <input type="password" name="password" id="password" placeholder="password" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="current-password" required>
                <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                    Login
                </button>
            </form>
            <p class="mt-4 text-sm">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </body>
</html>
