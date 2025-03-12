<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
    @vite('resources/css/app.css') <!-- Include your styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.875rem;
            color: #333;
        }

        .form-input {
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            width: 100%;
            margin-bottom: 1.25rem;
        }

        button {
            background-color: #1d4ed8;
            color: white;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2563eb;
        }

        label {
            color: #333;
        }

        .text-center {
            text-align: center;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .hover\:underline:hover {
            text-decoration: underline;
        }

        .mt-4 {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Candidate Registration</h1>
        <form method="POST" action="{{ route('candidate.register.post') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-md">Register</button>
        </form>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <p class="text-sm">
                Already have an account? 
                <a href="{{ route('candidate.login') }}" class="text-blue-500 hover:underline">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
