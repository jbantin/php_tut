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
            <h1 class="text-2xl font-semibold mb-4">Register</h1>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="name" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="name" required>
                @error('name')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="email" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="email" required>
                @error('email')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror
                <input type="password" name="password" id="password" placeholder="password" autocomplete="new-password" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" autocomplete="new-password" class="w-full mb-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror
                <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                    Register
                </button>
            </form>
            <p class="mt-4 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </body>
</html>
