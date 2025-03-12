<?php

namespace App\Http\Controllers;
use App\Notifications\ApplicationStatusUpdated;
use Illuminate\Support\Facades\Notification;
use App\Models\Application;
use Illuminate\Http\Request;


class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Update the status of the application
        $application->status = $request->status;
        $application->save();

        // Notify the candidate (user) about the status update
        $candidate = $application->candidate; // Get the candidate (user) from the application
        $candidate->notify(new ApplicationStatusUpdated($application));

        // Redirect or return response after successful update
        return redirect()->route('applications.index')->with('success', 'Application status updated and email sent.');
    }

    public function storeApplication(Request $request, $jobId)
{
    $request->validate([
        'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        'cover_letter' => 'required|string',
    ]);

    // Store Resume
    $resumePath =$request->file('resume')->store('resumes', 'public');

    // Save Application
    Application::create([
        'job_id' => $jobId,
        'candidate_id' => auth()->id(),
        'status' => 'pending',
        'resume' => $resumePath,
    ]);

    return redirect()->route('jobs.index')->with('success', 'Application submitted successfully.');
}

}

