<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Button to View Job Listings -->
                <div class="flex justify-center mt-6">
                    <a href="{{ route('jobs.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">View Job Listings</a>
                </div>

                <!-- Applied Jobs Section -->
                <div class="mt-8 bg-gray-100 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Your Applied Jobs</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2 text-left">Job Title</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $application->job->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($application->status) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('jobs.index', $application->job->id) }}" class="text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">No jobs applied yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
