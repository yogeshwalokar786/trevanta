<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

// Ensure helper is loaded
if (file_exists(app_path('helpers.php'))) {
    require_once app_path('helpers.php');
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // One-time automated self-healing database migration for Trevanta branding
        try {
            if (!\Illuminate\Support\Facades\Cache::has('branding_db_fixed_v3')) {
                if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                    \Illuminate\Support\Facades\DB::table('settings')
                        ->where('value', 'LIKE', '%astraclinical%')
                        ->orWhere('value', 'LIKE', '%astra%')
                        ->get()
                        ->each(function ($row) {
                            $newVal = str_ireplace('astraclinical.com', 'trevanta.com', $row->value);
                            $newVal = str_ireplace('astraclinical', 'Trevanta International', $newVal);
                            \Illuminate\Support\Facades\DB::table('settings')->where('id', $row->id)->update(['value' => $newVal]);
                        });
                    Setting::clearCache();
                }

                if (\Illuminate\Support\Facades\Schema::hasTable('blogs')) {
                    \Illuminate\Support\Facades\DB::table('blogs')
                        ->where('content', 'LIKE', '%astraclinical%')
                        ->orWhere('summary', 'LIKE', '%astraclinical%')
                        ->orWhere('title', 'LIKE', '%astraclinical%')
                        ->orWhere('meta_title', 'LIKE', '%astraclinical%')
                        ->orWhere('author_name', 'LIKE', '%astraclinical%')
                        ->get()
                        ->each(function ($b) {
                            $updates = [];
                            foreach (['title', 'summary', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description', 'author_name'] as $field) {
                                if (isset($b->$field) && (stripos($b->$field, 'astraclinical') !== false || stripos($b->$field, 'astra') !== false)) {
                                    $val = str_ireplace('astraclinical.com', 'trevanta.com', $b->$field);
                                    $val = str_ireplace('astraclinical', 'Trevanta International', $val);
                                    $updates[$field] = $val;
                                }
                            }
                            if (!empty($updates)) {
                                \Illuminate\Support\Facades\DB::table('blogs')->where('id', $b->id)->update($updates);
                            }
                        });
                }

                \Illuminate\Support\Facades\Cache::forever('branding_db_fixed_v3', true);
            }
        } catch (\Throwable $e) {
            // Silently continue if database is not reachable during build/cli
        }

        // Share site settings globally with all views
        try {
            $settings = Setting::getAll();
            View::share('settings', $settings);
        } catch (\Throwable $e) {
            View::share('settings', []);
        }
    }
}
