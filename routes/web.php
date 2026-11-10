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
Route::get('/global', fn () => redirect()->route('about'));
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.show');
Route::get('/insights', fn () => redirect()->route('blog'))->name('insights');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Public Policy & Legal Routes
Route::get('/policy/{slug}', [PageController::class, 'policyDetail'])->name('policy.show');
Route::get('/privacy-statement', fn () => redirect()->route('policy.show', 'privacy-statement'));
Route::get('/privacy-policy', fn () => redirect()->route('policy.show', 'privacy-statement'));
Route::get('/terms-of-use', fn () => redirect()->route('policy.show', 'terms-of-use'));
Route::get('/terms', fn () => redirect()->route('policy.show', 'terms-of-use'));
Route::get('/gcp-statement', fn () => redirect()->route('policy.show', 'gcp-statement'));
Route::get('/whistleblower-notice', fn () => redirect()->route('policy.show', 'whistleblower-notice'));
Route::get('/cookie-policy', fn () => redirect()->route('policy.show', 'cookie-policy'));
Route::get('/cookies', fn () => redirect()->route('policy.show', 'cookie-policy'));
Route::get('/electronic-records-policy', fn () => redirect()->route('policy.show', 'electronic-records-policy'));
Route::get('/part-11', fn () => redirect()->route('policy.show', 'electronic-records-policy'));
Route::get('/anti-bribery-policy', fn () => redirect()->route('policy.show', 'anti-bribery-policy'));
Route::get('/pharmacovigilance-safety-policy', fn () => redirect()->route('policy.show', 'pharmacovigilance-safety-policy'));
Route::get('/diversity-in-trials-policy', fn () => redirect()->route('policy.show', 'diversity-in-trials-policy'));
Route::get('/information-security-policy', fn () => redirect()->route('policy.show', 'information-security-policy'));

// Public Form Actions (Protected by Rate Limiting to prevent spam/abuse)
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit')->middleware('throttle:6,1');
Route::post('/rfp', [PageController::class, 'submitRfp'])->name('rfp.submit')->middleware('throttle:6,1');
Route::post('/careers/apply', [PageController::class, 'submitApplication'])->name('careers.apply')->middleware('throttle:6,1');

// Default Login Route Redirect to Admin Login
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes (AdminLTE Light Theme)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Guest Admin Routes (Protected by Brute Force Throttling: 5 attempts per minute)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit')->middleware('throttle:5,1');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Clinical Inquiries & Study RFPs
        Route::get('/inquiries', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/inquiries/all', fn () => redirect()->route('admin.inquiries.index'))->name('admin.inquiries');
        Route::get('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::patch('/inquiries/{id}/status', [\App\Http\Controllers\Admin\InquiryController::class, 'updateStatus'])->name('admin.inquiries.status');
        Route::delete('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');

        // Blogs & Insights Management
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);
        Route::post('blogs/{id}/toggle-publish', [\App\Http\Controllers\Admin\BlogController::class, 'togglePublish'])->name('admin.blogs.toggle-publish');

        // Job Openings & Careers Management
        Route::resource('jobs', \App\Http\Controllers\Admin\JobOpeningController::class, ['as' => 'admin']);
        Route::post('jobs/{id}/toggle-active', [\App\Http\Controllers\Admin\JobOpeningController::class, 'toggleActive'])->name('admin.jobs.toggle-active');

        // Candidate Job Applications
        Route::resource('applications', \App\Http\Controllers\Admin\JobApplicationController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
        Route::patch('applications/{id}/status', [\App\Http\Controllers\Admin\JobApplicationController::class, 'updateStatus'])->name('admin.applications.status');
        Route::get('applications/{id}/download', [\App\Http\Controllers\Admin\JobApplicationController::class, 'downloadResume'])->name('admin.applications.download');

        // Categories Management (Separate Categories Table)
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin']);

        // Media Library & Manager
        Route::resource('media', \App\Http\Controllers\Admin\MediaController::class, ['as' => 'admin'])->only(['index', 'store', 'destroy']);

        // Policy & Compliance Pages Management
        Route::resource('policies', \App\Http\Controllers\Admin\PolicyController::class, ['as' => 'admin']);
        Route::post('policies/{id}/toggle-active', [\App\Http\Controllers\Admin\PolicyController::class, 'toggleActive'])->name('admin.policies.toggle-active');

        // Site Settings Management (Contact, Addresses, Logos, SEO, Branding)
        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');

        // Admin Password & Account Security
        Route::get('password', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.password.edit');
        Route::put('password', [\App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('admin.password.update');
        Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'updateProfile'])->name('admin.profile.update');

        // System Diagnostics (Authenticated Admin Only)
        Route::get('clear-cache', function () {
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            return redirect()->route('admin.dashboard')->with('success', 'Application & View cache purged successfully!');
        })->name('admin.clear-cache');
    });
});

