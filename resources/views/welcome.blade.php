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
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#4b4b48] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="w-full max-w-xl">
            <h1 class="text-2xl font-semibold mb-4">Users</h1>
                @forelse ($users as $user)
                <div class="rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-between">
                    <p>
                        {{ $user->name }}
                    </p>
                    <p>
                        {{ $user->email }} <a href="{{ route('users.delete', $user) }}">delete</a>
                    </p>
                </div>
                @empty
                    <li class="text-gray-500">No users found.</li>
                @endforelse
        </div>
    <button>
        <a href="{{ route('users.create') }}" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
            Create User
        </a>
    </body>
</html>
