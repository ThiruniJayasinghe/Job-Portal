<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


// Candidate dashboard route

    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');

// Recruiter dashboard route

Route::get('/recruiter/dashboard', [RecruiterController::class, 'dashboard'])->name('recruiter.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    // Job Seekers
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    Route::post('/jobs/{job}/apply', [JobController::class, 'storeApplication'])->name('jobs.storeApplication');
    
    // Recruiters
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

    Route::resource('jobs', JobController::class);

Route::get('/candidate/register', [RegisteredUserController::class, 'showCandidateRegisterForm'])->name('candidate.register');
Route::post('/candidate/register', [RegisteredUserController::class, 'candidateRegister'])->name('candidate.register.post');
Route::get('/candidate/login', [LoginController::class, 'showCandidateLoginForm'])->name('candidate.login');
Route::post('/candidate/login', [LoginController::class, 'candidateLogin'])->name('candidate.login.post');

Route::get('/recruiter/register', [RegisteredUserController::class, 'showRecruiterRegisterForm'])->name('recruiter.register');
Route::post('/recruiter/register', [RegisteredUserController::class, 'recruiterRegister'])->name('recruiter.register.post');
Route::get('/recruiter/login', [LoginController::class, 'showRecruiterLoginForm'])->name('recruiter.login');
Route::post('/recruiter/login', [LoginController::class, 'recruiterLogin'])->name('recruiter.login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User Management
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Job Management
    Route::get('/admin/jobs', [JobController::class, 'adminJobs'])->name('admin.jobs');
    Route::post('/admin/jobs/{id}/approve', [JobController::class, 'approveJob'])->name('admin.jobs.approve');
    Route::post('/admin/jobs/{id}/delete', [JobController::class, 'deleteJob'])->name('admin.jobs.delete');
});

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');

// Handle Admin Login
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.post');

// Admin Dashboard Route (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Create this Blade file if needed
    })->name('admin.dashboard');

    // Admin Logout
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});



require __DIR__.'/auth.php';
