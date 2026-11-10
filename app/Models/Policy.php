<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'policies';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'effective_date',
        'is_active',
        'order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    /**
     * Scope for active policies only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Boot model events for auto-generating slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($policy) {
            if (empty($policy->slug)) {
                $policy->slug = Str::slug($policy->title);
            }
        });
    }

    /**
     * Helper to get public URL.
     */
    public function getUrlAttribute(): string
    {
        return route('policy.show', $this->slug);
    }
}

