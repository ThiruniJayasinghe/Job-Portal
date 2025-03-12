<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ApplicationStatusUpdated;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    

    protected $fillable = [
        'name', 'email', 'password', 'role','profile_photo','resume','skills'
    ];
    
    
    const ROLE_CANDIDATE = 'candidate';
    const ROLE_RECRUITER = 'recruiter';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted(): void
      {
          static::created(function ($user) {
              $user->notify(new \App\Notifications\ApplicationStatusUpdated($user));
          });
      }
    public function jobs()
{
    return $this->hasMany(Job::class, 'recruiter_id');
}

public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
