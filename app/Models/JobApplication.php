<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_opening_id',
        'position_title',
        'name',
        'email',
        'phone',
        'current_location',
        'experience',
        'resume_path',
        'cover_letter',
        'status',
        'notes',
    ];

    /**
     * The job opening this application belongs to (if specific).
     */
    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class, 'job_opening_id');
    }

    /**
     * Scope for new / pending review applications.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Full URL or asset path to the uploaded resume.
     */
    public function getResumeUrlAttribute()
    {
        if (empty($this->resume_path)) {
            return null;
        }

        return asset($this->resume_path);
    }
}
