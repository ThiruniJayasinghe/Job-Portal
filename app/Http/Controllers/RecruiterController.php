<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    // Recruiter dashboard view
    public function dashboard()
    {
        return view('recruiter.dashboard'); 
    }
}

