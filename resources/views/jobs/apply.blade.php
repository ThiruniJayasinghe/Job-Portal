<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <style>
      /* Body styling */
      body {
        background-color: #f7fafc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
      }

      /* Container for the form */
      .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      h2 {
        font-size: 24px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 16px;
        width: 100%;
      }

      /* Input and textarea styling */
      input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        color: #4a5568;
        background-color: #fafafa;
        margin-bottom: 12px;
        transition: border-color 0.3s ease;
      }

      input[type="file"]:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.5);
      }

      textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        color: #4a5568;
        background-color: #fafafa;
        min-height: 120px;
        transition: border-color 0.3s ease;
      }

      textarea:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.5);
      }

      /* Button styling */
      button {
        width: 100%;
        padding: 12px;
        background-color: #3182ce;
        color: white;
        border-radius: 8px;
        border: none;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
      }

      button:hover {
        background-color: #2b6cb0;
        transform: translateY(-3px);
      }

      button:active {
        transform: translateY(1px);
      }

      /* Responsive styling */
      @media screen and (max-width: 768px) {
        .form-container {
          padding: 20px;
          width: 90%;
        }
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <h2>Apply for Job</h2>
      <form method="POST" action="{{ route('jobs.storeApplication', $job->id) }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Resume input -->
        <div class="form-group">
          <input type="file" name="resume" required>
        </div>

        <!-- Cover letter textarea -->
        <div class="form-group">
          <textarea name="cover_letter" placeholder="Cover Letter" required></textarea>
        </div>

        <!-- Submit button -->
        <div class="form-group">
          <button type="submit">Apply</button>
        </div>
      </form>
    </div>
  </body>
</html>
