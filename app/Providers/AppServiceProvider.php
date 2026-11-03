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
        // Share site settings globally with all views
        try {
            $settings = Setting::getAll();
            View::share('settings', $settings);
        } catch (\Throwable $e) {
            View::share('settings', []);
        }
    }
}
