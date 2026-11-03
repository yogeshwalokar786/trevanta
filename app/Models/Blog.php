<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'badge',
        'summary',
        'content',
        'image',
        'read_time',
        'author_name',
        'author_title',
        'author_avatar',
        'is_featured',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if (empty($blog->published_at)) {
                $blog->published_at = now();
            }
            if (empty($blog->author_avatar) && !empty($blog->author_name)) {
                $words = explode(' ', trim($blog->author_name));
                $initials = '';
                foreach ($words as $w) {
                    $cleaned = preg_replace('/[^A-Za-z]/', '', $w);
                    if (!empty($cleaned) && !in_array(strtolower($cleaned), ['dr', 'mr', 'ms', 'mrs', 'md', 'phd', 'rac'])) {
                        $initials .= strtoupper($cleaned[0]);
                    }
                }
                $blog->author_avatar = substr($initials ?: 'AC', 0, 2);
            }
        });
    }

    /**
     * Scope for published articles.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for spotlight/featured articles.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}

