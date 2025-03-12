<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // In your JobController or similar controller

public function index(Request $request)
{
    // Get the search query from the request
    $searchQuery = $request->input('search');
    
    // Query the jobs with a search filter for both title and company
    $jobs = Job::where('title', 'LIKE', "%{$searchQuery}%")
                ->orWhere('company', 'LIKE', "%{$searchQuery}%")
                ->get();

    // Return the view with the jobs data
    return view('jobs.index', compact('jobs'));
}


    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
        ]);

        $job = new Job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->recruiter_id = auth()->id();
        $job->save();

        return redirect()->route('jobs.index');
    }

    public function apply($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.apply', compact('job'));
    }

    public function storeApplication(Request $request, $id)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf|max:10240', // max 10MB
            'cover_letter' => 'required',
        ]);

        $job = Job::findOrFail($id);
        
        $resumePath =$request->file('resume')->store('resumes', 'public');

        Application::create([
            'job_id' => $job->id,
            'candidate_id' => auth()->id(),
            'status' => 'pending',
            'resume' => $resumePath,
        ]);

        return redirect()->route('jobs.index');
    }

    public function edit($id)
{
    $job = Job::findOrFail($id);

    // Ensure only the recruiter who posted the job can edit it
    if ($job->recruiter_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('jobs.edit', compact('job'));
}

public function update(Request $request, $id)
{
    $job = Job::findOrFail($id);

    if ($job->recruiter_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'company' => 'required',
    ]);

    $job->update([
        'title' => $request->title,
        'description' => $request->description,
        'company' => $request->company,
    ]);

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
}

public function destroy($id)
{
    $job = Job::findOrFail($id);

    if ($job->recruiter_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $job->delete();

    return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
}

public function adminJobs()
    {
        $jobs = Job::all();
        return view('admin.jobs', compact('jobs'));
    }

    public function approveJob($id)
    {
        $job = Job::findOrFail($id);
        $job->status = 'approved';
        $job->save();

        return redirect()->route('admin.jobs')->with('success', 'Job approved successfully.');
    }

    public function deleteJob($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('admin.jobs')->with('success', 'Job deleted successfully.');
    }
    
}
