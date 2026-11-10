<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings management page.
     */
    public function index()
    {
        $settings = Setting::getAll();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings in storage with input sanitization.
     */
    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            // Validate key format (only alphanumeric, dashes, underscores)
            if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $key)) {
                continue;
            }

            // Clean string values
            if (is_string($value)) {
                $value = str_replace(chr(0), '', $value);
                // For SEO & Contact & Branding, strip raw script tags
                if (!str_contains($key, 'custom_html') && !str_contains($key, 'analytics_head')) {
                    $value = strip_tags($value);
                }
                $value = trim($value);
            }

            // Determine group based on key prefix or name
            $group = 'general';
            if (str_contains($key, '_meta_') || str_contains($key, '_og_image') || str_starts_with($key, 'home_') || str_starts_with($key, 'meta_') || $key === 'canonical_url_base') {
                $group = 'seo';
            } elseif (str_starts_with($key, 'site_') || str_starts_with($key, 'admin_')) {
                $group = 'branding';
            } elseif (str_starts_with($key, 'career_') || str_starts_with($key, 'careers_')) {
                $group = 'careers';
            } elseif (str_starts_with($key, 'phone_') || str_ends_with($key, '_email') || str_starts_with($key, 'contact_') || $key === 'operating_hours') {
                $group = 'contact';
            } elseif (str_starts_with($key, 'address_')) {
                $group = 'addresses';
            } elseif (str_starts_with($key, 'social_') || str_starts_with($key, 'footer_')) {
                $group = 'social';
            }

            // Clean image paths if selected from media library
            if (is_string($value) && (str_contains($key, 'logo') || str_contains($key, 'image') || str_contains($key, 'favicon'))) {
                // Strip directory traversal
                $value = str_replace(['..', "\0"], '', $value);
                if (str_starts_with($value, '/')) {
                    $value = ltrim($value, '/');
                }
            }

            Setting::set($key, $value, $group);
        }

        Setting::clearCache();

        return redirect()->route('admin.settings.index')->with('success', 'Site settings, branding, contact details, and SEO updated successfully!');
    }
}

