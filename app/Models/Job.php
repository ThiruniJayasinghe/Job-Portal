<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model


{

    use HasFactory;
    protected $fillable = ['title', 'description', 'company', 'recruiter_id'];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($job) {
            $job->applications()->delete();
        });
    }
}
