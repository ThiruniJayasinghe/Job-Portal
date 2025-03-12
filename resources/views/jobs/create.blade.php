<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <style>
      /* Custom styles */
      body {
        background-color: #f7fafc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .form-container {
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 40px;
        width: 100%;
        max-width: 480px;
      }

      h2 {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        color: #2d3748;
        margin-bottom: 30px;
      }

      label {
        font-size: 14px;
        color: #4a5568;
        font-weight: 500;
      }

      input,
      textarea {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
      }

      input:focus,
      textarea:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.5);
      }

      button {
        width: 100%;
        padding: 14px;
        background-color: #3182ce;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      button:hover {
        background-color: #2b6cb0;
      }

      .form-group {
        margin-bottom: 20px;
      }

      .textarea {
        resize: vertical;
      }

      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <div class="container">
      <div class="form-container">
        <h2>Post a New Job</h2>
        <form method="POST" action="{{ route('jobs.store') }}">
          @csrf
          <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" placeholder="Job Title">
          </div>

          <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" placeholder="Job Description" rows="4" class="textarea"></textarea>
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" placeholder="Company">
          </div>

          <button type="submit">Post Job</button><br><br>

          <a href="{{ route('recruiter.dashboard') }}" 
       class="inline-block bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800 transition mb-4">
        ← Back to Dashboard
    </a>
        </form>
        
      </div>
      
    </div>
    
  </body>
</html>
