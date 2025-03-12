<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

                <!-- Welcome Message -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">Welcome back, Admin! Manage users and job postings here.</p>
                </div>

                <!-- Admin Dashboard Sections -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Manage Users Card -->
                        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                            <h3 class="text-xl font-semibold">Manage Users</h3>
                            <p class="mt-2 text-sm opacity-90">View and manage registered users.</p>
                            <a href="{{ route('admin.users') }}"
                                class="inline-block mt-4 bg-white text-blue-500 px-4 py-2 rounded-md font-semibold hover:bg-gray-200">
                                Go to Users
                            </a>
                        </div>

                        <!-- Manage Jobs Card -->
                        <div class="bg-green-500 text-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                            <h3 class="text-xl font-semibold">Manage Jobs</h3>
                            <p class="mt-2 text-sm opacity-90">Create, update, and delete job postings.</p>
                            <a href="{{ route('admin.jobs') }}"
                                class="inline-block mt-4 bg-white text-green-500 px-4 py-2 rounded-md font-semibold hover:bg-gray-200">
                                Go to Jobs
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Logout Button -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white px-6 py-2 rounded-md font-semibold hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
