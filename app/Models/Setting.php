<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'label',
    ];

    /**
     * Get a setting by key with fallback default.
     */
    public static function get(string $key, $default = null)
    {
        $all = static::getAll();
        if (array_key_exists($key, $all) && $all[$key] !== null && $all[$key] !== '') {
            return $all[$key];
        }
        return $default;
    }

    /**
     * Set or update a setting value.
     */
    public static function set(string $key, $value, string $group = 'general', string $type = 'text', ?string $label = null): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'type' => $type,
                'label' => $label,
            ]
        );

        static::clearCache();
        return $setting;
    }

    /**
     * Get all settings as a key => value array with caching.
     */
    public static function getAll(): array
    {
        try {
            return Cache::remember('site_settings_all', 86400, function () {
                return static::pluck('value', 'key')->toArray();
            });
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Clear cached settings.
     */
    public static function clearCache(): void
    {
        Cache::forget('site_settings_all');
    }
}

