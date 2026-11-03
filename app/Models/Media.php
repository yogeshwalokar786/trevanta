<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'filename',
        'path',
        'mime_type',
        'size',
        'alt_text',
    ];

    /**
     * Get the web accessible URL of the media file.
     */
    public function getUrlAttribute()
    {
        return asset($this->path);
    }

    /**
     * Get formatted human readable file size.
     */
    public function getFormattedSizeAttribute()
    {
        $bytes = (int) $this->size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }

    /**
     * Check if media file is an image.
     */
    public function getIsImageAttribute()
    {
        if ($this->mime_type && str_starts_with($this->mime_type, 'image/')) {
            return true;
        }
        $ext = strtolower(pathinfo($this->filename, PATHINFO_EXTENSION));
        return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
    }
}

