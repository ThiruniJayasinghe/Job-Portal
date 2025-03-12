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

      /* Container for job listings */
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
      }

      /* Header for job listings */
      h1 {
        text-align: center;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #2d3748;
      }

      /* Job listing styling */
      .job-listing {
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        margin-bottom: 16px;
        padding: 16px;
        width: 100%;
        max-width: 600px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      }

      .job-listing:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }

      .job-title {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
      }

      .apply-btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #3182ce;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        margin-top: 8px;
        transition: background-color 0.3s;
      }

      .apply-btn:hover {
        background-color: #2b6cb0;
      }

      /* Search form styling */
      .search-form {
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 16px;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .search-form input {
        width: 80%;
        padding: 10px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
      }

      .search-form input:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.5);
      }

      .search-form button {
        padding: 10px 20px;
        background-color: #3182ce;
        color: #fff;
        border-radius: 6px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      .search-form button:hover {
        background-color: #2b6cb0;
      }

      /* Responsive styling */
      @media screen and (max-width: 768px) {
        .search-form {
          flex-direction: column;
          align-items: stretch;
        }

        .search-form input,
        .search-form button {
          width: 100%;
          margin-bottom: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Available Job Listings</h1>

      <!-- Search form -->
      <form method="GET" action="{{ route('jobs.index') }}" class="search-form">
        <input type="text" name="search" placeholder="Search jobs..." value="{{ request('search') }}" aria-label="Search jobs">
        <button type="submit">Search</button>
      </form>

      <!-- Job listings -->
      @foreach ($jobs as $job)
        <div class="job-listing">
          <div class="job-title">{{ $job->title }}</div>
          <div class="job-description">{{ $job->description }}</div>
          <div class="job-company">{{ $job->company }}</div>
          <a href="{{ route('jobs.apply', $job->id) }}" class="apply-btn">Apply</a>
        </div>
      @endforeach
    </div>
  </body>
</html>
