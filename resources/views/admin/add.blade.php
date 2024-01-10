<x-app-layout>

<!-- resources/views/admin/users/create.blade.php -->
<form action="{{ route('admin.users.store') }}" method="post" class="max-w-md mx-auto mt-4 p-4 bg-white shadow-md rounded-md">
    @csrf

     <div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input mt-1 block w-full" />
</div>

<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input mt-1 block w-full" />
</div>

<div class="mb-4">
    <label for="password" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Password</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-input mt-1 block w-full" />
</div>

     <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">Add User</button>
     <button  class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring focus:border-indigo-700 active:bg-indigo-800">   
                <a href="{{ route('home') }}">Back
                </button>
</form>

</x-app-layout>