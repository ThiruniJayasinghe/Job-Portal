<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    // Candidate dashboard view
    public function dashboard()
    {
        $applications = Application::where('candidate_id', Auth::id())->with('job')->get();
    
    return view('candidate.dashboard', compact('applications'));
    }
}

