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
            $val = $all[$key];
            if (is_string($val)) {
                $val = static::sanitizeBranding($val);
            }
            return $val;
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
            $settings = Cache::remember('site_settings_all', 86400, function () {
                return static::pluck('value', 'key')->toArray();
            });

            if (is_array($settings)) {
                foreach ($settings as $k => $v) {
                    if (is_string($v)) {
                        $settings[$k] = static::sanitizeBranding($v);
                    }
                }
            }

            return $settings ?: [];
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Sanitize branding strings on the fly.
     */
    public static function sanitizeBranding(?string $val): ?string
    {
        if ($val === null) {
            return null;
        }
        if (stripos($val, 'astraclinical') !== false || stripos($val, 'astra') !== false) {
            $val = str_ireplace('astraclinical.com', 'trevanta.com', $val);
            $val = str_ireplace('astraclinical', 'Trevanta International', $val);
        }
        return $val;
    }

    /**
     * Clear cached settings.
     */
    public static function clearCache(): void
    {
        Cache::forget('site_settings_all');
    }
}

