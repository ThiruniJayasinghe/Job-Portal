<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
class Application extends Model
{
    protected $fillable = ['job_id', 'candidate_id', 'status', 'resume'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function candidate()
{
    return $this->belongsTo(User::class, 'candidate_id');
}

// In the Application model (app/Models/Application.php)

public function user()
{
    return $this->belongsTo(User::class); // Assuming your User model is the candidate
}

}

