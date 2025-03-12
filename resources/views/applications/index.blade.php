<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-Portal</title>
    @vite('resources/css/app.css') <!-- Include your styles -->
</head>
<body>
<div class="pl-6 pt-6"> <!-- Added padding on the left (pl-6) and top (pt-6) -->

    
    @foreach ($applications as $application)
        <div class="bg-white shadow-md rounded-lg p-6 mb-4 border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ $application->job ? $application->job->title : 'Job Not Available' }}
            </h2>
            <p class="text-sm text-gray-600">Status: 
                <span class="font-medium {{ $application->status == 'accepted' ? 'text-green-600' : 'text-red-600' }}">
                    {{ ucfirst($application->status) }}
                </span>
            </p>

            <!-- Resume Download -->
            @if($application->resume)
                <a href="{{ asset('storage/' . $application->resume) }}" target="_blank" 
                   class="text-blue-500 underline mt-2 inline-block hover:text-blue-700">
                    📄 View Resume
                </a>
            @else
                <p class="text-gray-500 text-sm mt-2">No resume uploaded</p>
            @endif

            <!-- Update Status Form -->
            <form method="POST" action="{{ route('applications.updateStatus', $application->id) }}" class="mt-4">
    @csrf
    @method('PUT')
    <div class="flex items-center space-x-3">
        <select name="status" class="border border-gray-300 rounded-md px-3 py-1 focus:ring-2 focus:ring-blue-400">
            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-1.5 rounded-md hover:bg-blue-700 transition">
            Update Status
        </button>
    </div>
</form>
        </div>
    @endforeach
<!-- Back to Dashboard Button -->
<a href="{{ route('recruiter.dashboard') }}" 
       class="inline-block bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800 transition mb-4">
        ← Back to Dashboard
    </a>

</div>
</body>
</html>
