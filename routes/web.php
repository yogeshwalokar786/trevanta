<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/global', [PageController::class, 'global'])->name('global');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Public Form Actions
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::post('/rfp', [PageController::class, 'submitRfp'])->name('rfp.submit');

// Default Login Route Redirect to Admin Login
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes (AdminLTE Light Theme)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Guest Admin Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/inquiries', [DashboardController::class, 'inquiries'])->name('admin.inquiries');
        Route::patch('/inquiries/{id}/status', [DashboardController::class, 'updateStatus'])->name('admin.inquiries.status');
        Route::delete('/inquiries/{id}', [DashboardController::class, 'destroy'])->name('admin.inquiries.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| System & Database Diagnostics (for Hosting Setup)
|--------------------------------------------------------------------------
*/

Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return '<div style="font-family:sans-serif;max-width:600px;margin:50px auto;padding:25px;border:1px solid #10b981;border-radius:10px;background:#f0fdf4;">'
        . '<h3 style="color:#065f46;margin-top:0;">Configuration &amp; View Cache Cleared Successfully!</h3>'
        . '<p style="color:#047857;">All application caches have been purged. Your latest .env settings are now active.</p>'
        . '<a href="/test-db" style="display:inline-block;margin-right:15px;color:#2563eb;font-weight:bold;">&rarr; Test Database Connection</a>'
        . '<a href="/admin/login" style="display:inline-block;color:#f26224;font-weight:bold;">&rarr; Go to Admin Login</a>'
        . '</div>';
})->name('system.clear-cache');

Route::get('/test-db', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        $dbName = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
        $userCount = \App\Models\User::count();
        $inquiryCount = \App\Models\Inquiry::count();
        return '<div style="font-family:sans-serif;max-width:650px;margin:50px auto;padding:25px;border:1px solid #10b981;border-radius:10px;background:#f0fdf4;">'
            . '<h2 style="color:#065f46;margin-top:0;">MySQL Database Connected Successfully!</h2>'
            . '<p style="font-size:16px;"><strong>Database:</strong> <code>' . e($dbName) . '</code></p>'
            . '<p style="font-size:16px;"><strong>Admin Users in Table:</strong> ' . $userCount . '</p>'
            . '<p style="font-size:16px;"><strong>Clinical Inquiries in Table:</strong> ' . $inquiryCount . '</p>'
            . '<hr style="border:0;border-top:1px solid #a7f3d0;margin:20px 0;">'
            . '<a href="/admin/login" style="display:inline-block;background:#f26224;color:#fff;padding:10px 18px;border-radius:6px;text-decoration:none;font-weight:bold;">Proceed to Admin Login &rarr;</a>'
            . '</div>';
    } catch (\Throwable $e) {
        return '<div style="font-family:sans-serif;max-width:700px;margin:50px auto;padding:25px;border:1px solid #f87171;border-radius:10px;background:#fef2f2;">'
            . '<h2 style="color:#991b1b;margin-top:0;">MySQL Connection Error (1045 Access Denied)</h2>'
            . '<p style="color:#b91c1c;background:#fee2e2;padding:12px;border-radius:6px;font-family:monospace;font-size:13px;">' . e($e->getMessage()) . '</p>'
            . '<h4 style="color:#7f1d1d;margin-bottom:8px;">How to resolve this in cPanel:</h4>'
            . '<ol style="color:#374151;line-height:1.7;">'
            . '<li>Log in to your <strong>cPanel</strong>.</li>'
            . '<li>Click on <strong>MySQL Databases</strong>.</li>'
            . '<li>Scroll down to the section titled <strong>"Add User To Database"</strong>.</li>'
            . '<li>Select User: <strong>171790771_trevanta</strong> and Database: <strong>171790771_trevanta</strong>.</li>'
            . '<li>Click the <strong>"Add"</strong> button.</li>'
            . '<li>On the next screen, tick the box for <strong>"ALL PRIVILEGES"</strong> and click <strong>"Make Changes"</strong>.</li>'
            . '<li>If you recently changed the password, click <strong>"Change Password"</strong> next to user <code>171790771_trevanta</code> in cPanel and reset it to match your <code>.env</code>.</li>'
            . '<li>After doing that, refresh this page (<code>/test-db</code>)!</li>'
            . '</ol>'
            . '<hr style="border:0;border-top:1px solid #fecaca;margin:20px 0;">'
            . '<a href="/clear-cache" style="color:#2563eb;font-weight:bold;">&larr; Clear Cache</a>'
            . '</div>';
    }
})->name('system.test-db');

