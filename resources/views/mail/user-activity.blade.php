<x-mail::message>
# User {{ $action }}

A user was **{{ $action }}** in {{ config('app.name') }}.

- **Name:** {{ $user->name }}
- **Email:** {{ $user->email }}

@if ($user->exists)
<x-mail::button :url="route('users.show', $user)">
View User
</x-mail::button>
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
