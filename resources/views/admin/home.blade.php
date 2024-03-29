<!-- resources/views/admin/home.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __("You're logged in as Admin!") }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg p-6">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 pb-4">User List</h2>

        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <!-- Avoid displaying passwords directly -->
                    <th class="py-2 px-4 border">Password</th>
                    <th class="py-2 px-4 border">Edit</th>
                    <th class="py-2 px-4 border">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="py-2 px-4 border">{{ $user->name }}</td>
                        <td class="py-2 px-4 border">{{ $user->email }}</td>
                        <!-- Avoid displaying passwords directly -->
                        <td class="py-2 px-4 border">{{ $user->password }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">Edit</a>
                        </td>
                        <td class="py-2 px-4 border">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-center inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 px-4 border-b" colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="flex justify-center mt-5">
            <a href="{{ route('admin.users.add') }}" class="text-center inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">Add user</a>
        </div>
    </div>
</x-app-layout>
