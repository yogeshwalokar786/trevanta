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
