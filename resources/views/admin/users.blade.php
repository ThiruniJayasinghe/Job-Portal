<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    @vite('resources/css/app.css') <!-- Include your styles -->
</head>
<body>
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Manage Users</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-blue-500 text-white text-left">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-700">
                @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-200">{{ $user->id }}</td>
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-200">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-200">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                 <span class="px-2 py-1 text-xs font-semibold rounded-md text-white 
                    {{ $user->role === 'admin' ? 'bg-green-500' : '' }} 
                   {{ $user->role === 'recruiter' ? 'bg-yellow-500' : '' }} 
                  {{ $user->role === 'candidate' ? 'bg-blue-500' : '' }}">
                       {{ ucfirst($user->role) }}
                   </span>
                     </td>


                    <td class="px-4 py-2">
                        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
