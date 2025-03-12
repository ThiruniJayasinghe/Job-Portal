<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .section-header h1 {
            font-size: 3rem;
            color: #2b2b2b;
        }
        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            align-items: center;
            justify-content: center;
        }
        .buttons-container .btn {
            padding: 12px 24px;
            font-size: 1.25rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-candidate {
            background-color: #3498db;
            color: white;
        }
        .btn-candidate:hover {
            background-color: #2980b9;
        }
        .btn-recruiter {
            background-color: #2ecc71;
            color: white;
        }
        .btn-recruiter:hover {
            background-color: #27ae60;
        }
        .btn-login {
            background-color: #2c3e50;
            color: white;
        }
        .btn-login:hover {
            background-color: #34495e;
        }
        .about-section {
            background-color: #ffffff;
            padding: 3rem 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
        }
        .about-section h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .about-section p {
            font-size: 1.125rem;
            color: #666;
            line-height: 1.6;
        }
        .footer {
            margin-top: 3rem;
            text-align: center;
            font-size: 1rem;
            color: #888;
        }
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-20">
        <!-- Header Section -->
        <div class="section-header">
            <h1>Welcome to Job Portal</h1>
            <p class="text-lg text-gray-600">Choose your role to get started</p>
        </div>

        <!-- Buttons for Role Selection -->
        <div class="buttons-container">
            <!-- Candidate Registration/Login -->
            <div class="space-x-4">
                <a href="{{ route('candidate.register') }}" class="btn btn-candidate">
                    Register as Candidate
                </a>
                <a href="{{ route('candidate.login') }}" class="btn btn-login">
                    Login as Candidate
                </a>
            </div>

            <!-- Recruiter Registration/Login -->
            <div class="space-x-4 mt-6">
                <a href="{{ route('recruiter.register') }}" class="btn btn-recruiter">
                    Register as Recruiter
                </a>
                <a href="{{ route('recruiter.login') }}" class="btn btn-login">
                    Login as Recruiter
                </a>
            </div>
        </div>

        <!-- About Us Section -->
        <div class="about-section">
            <h2>About Us</h2>
            <p>Welcome to the Job Portal, a platform designed to bridge the gap between job seekers and employers. Whether you're looking for your next career opportunity or seeking top talent, our portal offers a seamless experience for both candidates and recruiters. We aim to provide a user-friendly, secure, and efficient platform to help you achieve your goals, whether you're just starting your job search or managing the recruitment process for your company.</p>
            <p>Join us today to explore endless opportunities, make connections, and take the next step in your career or hiring journey. Our platform is designed to meet the needs of job seekers and recruiters alike, providing easy access to job listings, resumes, and application tracking.</p>
        </div>

        
    </div>
</body>
</html>
