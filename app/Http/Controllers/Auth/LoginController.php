<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show Candidate Login Form
    public function showCandidateLoginForm()
    {
        return view('auth.candidate_login');
    }

    // Handle Candidate Login
    public function candidateLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'candidate';

        if (Auth::attempt($credentials)) {
            return redirect()->route('candidate.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or incorrect role']);
    }

    // Show Recruiter Login Form
    public function showRecruiterLoginForm()
    {
        return view('auth.recruiter_login');
    }

    // Handle Recruiter Login
    public function recruiterLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'recruiter';

        if (Auth::attempt($credentials)) {
            return redirect()->route('recruiter.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or incorrect role']);
    }

    // Show Admin Login Form
    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    // Handle Admin Login
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin'; // Ensure only admin role can log in

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials or unauthorized role.']);
    }

    // Logout Admin
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
