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
        <p>
            {{ $user->name }}
        </p>
        <p>
            {{ $user->email }}
        </p>
    <a href="{{ route('home') }}">Back to users</a>
    </body>
</html>
