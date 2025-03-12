<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    @vite('resources/css/app.css') <!-- Include your styles -->
    <style>
        /* Additional custom styles for background, padding, and form styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }

        .form-container .form-input {
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            width: 100%;
            margin-bottom: 1.25rem;
        }

        .form-container button {
            background-color: #4caf50;
            color: white;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container p {
            text-align: center;
            margin-top: 1rem;
            color: #666;
        }

        .form-container p a {
            color: #4caf50;
            text-decoration: none;
        }
        
        .form-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login as Recruiter</h2>
        <form method="POST" action="{{ route('recruiter.login.post') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="form-input" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <button type="submit">Login as Recruiter</button>
        </form>

        <p>Not a recruiter? <a href="{{ route('candidate.login') }}">Login as Candidate</a></p>
        <div class="text-center mt-4">
            <p>
                Don't have an account? 
                <a href="{{ route('recruiter.register') }}" class="text-blue-500 hover:underline">Register</a>
            </p>
        </div>
    </div>

    
    </div>
</body>
</html>
