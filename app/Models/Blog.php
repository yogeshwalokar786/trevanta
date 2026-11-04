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
        'category_id',
        'category',
        'badge',
        'summary',
        'content',
        'image',
        'read_time',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'meta_robots',
        'schema_type',
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
                $blog->author_avatar = substr($initials ?: 'TI', 0, 2);
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

    /**
     * Dedicated category relationship.
     */
    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Dynamic branding sanitizers.
     */
    public function getTitleAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    public function getSummaryAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    public function getContentAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    public function getMetaTitleAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    public function getMetaDescriptionAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    public function getAuthorNameAttribute($value)
    {
        return $this->sanitizeBranding($value);
    }

    protected function sanitizeBranding($value)
    {
        if (is_string($value) && (stripos($value, 'astraclinical') !== false || stripos($value, 'astra') !== false)) {
            $value = str_ireplace('astraclinical.com', 'trevanta.com', $value);
            $value = str_ireplace('astraclinical', 'Trevanta International', $value);
        }
        return $value;
    }

    /**
     * Effective SEO Meta Title fallback.
     */
    public function getEffectiveMetaTitleAttribute()
    {
        return !empty($this->meta_title) ? $this->meta_title : $this->title;
    }

    /**
     * Effective SEO Meta Description fallback.
     */
    public function getEffectiveMetaDescriptionAttribute()
    {
        if (!empty($this->meta_description)) {
            return $this->meta_description;
        }
        return Str::limit(strip_tags($this->summary ?: $this->content), 160);
    }

    /**
     * Effective Social Image fallback.
     */
    public function getEffectiveOgImageAttribute()
    {
        return !empty($this->og_image) ? $this->og_image : $this->image;
    }
}

