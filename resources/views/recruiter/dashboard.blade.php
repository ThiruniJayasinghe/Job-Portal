<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100 mb-6">
                    <p class="text-lg">{{ __("You're logged in!") }}</p>
                </div>

                <!-- Buttons for Job Actions -->
                <div class="mt-6 space-x-4 flex justify-start">
                    <a href="{{ route('jobs.index') }}" 
                        class="inline-block bg-blue-500 text-white px-8 py-3 rounded-md hover:bg-blue-600 transition duration-200 shadow-lg transform hover:scale-105">
                        View Job Listings
                    </a>
                    <a href="{{ route('jobs.create') }}" 
                        class="inline-block bg-green-500 text-white px-8 py-3 rounded-md hover:bg-green-600 transition duration-200 shadow-lg transform hover:scale-105">
                        Create Job
                    </a>
                    <a href="{{ route('applications.index') }}" 
                        class="inline-block bg-purple-500 text-white px-8 py-3 rounded-md hover:bg-purple-600 transition duration-200 shadow-lg transform hover:scale-105">
                        View Applications
                    </a>
                </div>

                <!-- Recruiter's Jobs List -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Your Posted Jobs</h3>
                    <div class="overflow-x-auto rounded-lg shadow-md">
                        <table class="min-w-full table-auto border-collapse border border-gray-300 bg-gray-50">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-gray-300 p-3 text-left">Title</th>
                                    <th class="border border-gray-300 p-3 text-left">Company</th>
                                    <th class="border border-gray-300 p-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->jobs as $job)
                                    <tr class="hover:bg-gray-100">
                                        <td class="border border-gray-300 p-3">{{ $job->title }}</td>
                                        <td class="border border-gray-300 p-3">{{ $job->company }}</td>
                                        <td class="border border-gray-300 p-3 flex space-x-3">
                                            <a href="{{ route('jobs.edit', $job->id) }}" 
                                                class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    onclick="return confirm('Are you sure?')"
                                                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">
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

            </div>
        </div>
    </div>
</x-app-layout>
