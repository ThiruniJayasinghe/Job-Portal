<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    @vite('resources/css/app.css') 
</head>
<body class="pt-4 pl-4"> <!-- Added padding-top and padding-left here -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Jobs</h2>
    <div class="overflow-x-auto shadow-md rounded-lg bg-white">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border-b py-3 px-6 text-left">ID</th>
                    <th class="border-b py-3 px-6 text-left">Title</th>
                    <th class="border-b py-3 px-6 text-left">Company</th>
                    <th class="border-b py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr class="hover:bg-gray-50">
                    <td class="border-b py-3 px-6 text-gray-700">{{ $job->id }}</td>
                    <td class="border-b py-3 px-6 text-gray-700">{{ $job->title }}</td>
                    <td class="border-b py-3 px-6 text-gray-700">{{ $job->company }}</td>
                    <td class="border-b py-3 px-6">
                        <form method="POST" action="{{ route('admin.jobs.delete', $job->id) }}" class="inline">
                            @csrf
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <a href="{{ route('admin.dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800 transition mt-4"> ← Back to Dashboard</a> <!-- Added margin-top -->
</body>
</html>
