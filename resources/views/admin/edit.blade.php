<!-- resources/views/admin/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __("Edit User Information") }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg p-6">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input mt-1 block w-full" />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full" />
            </div>

            <!-- You can add more fields here based on your User model -->

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
