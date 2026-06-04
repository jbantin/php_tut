@forelse ($users as $user)
    <div class="rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-between items-center">
        <a href="{{ route('users.show', $user) }}" class="flex gap-4">
            <span>{{ $user->name }}</span>
            <span>{{ $user->email }}</span>
        </a>
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">delete</button>
        </form>
    </div>
@empty
    <p class="text-gray-500">No users found.</p>
@endforelse