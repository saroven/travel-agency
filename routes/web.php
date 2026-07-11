<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;

use App\Http\Controllers\Admin\SettingController;

// ────────────────────────────────────────
// Admin Auth Routes (public)
// ────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ────────────────────────────────────────
// Admin Protected Routes
// ────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', fn() => redirect()->route('admin.dashboard'));

    // Tour Packages
    Route::resource('packages', PackageController::class);

    // Leads
    Route::get('/leads/export', [LeadController::class, 'export'])->name('leads.export');
    Route::resource('leads', LeadController::class)->except(['create', 'store']);

    // Visa
    Route::resource('visa', VisaController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

use App\Http\Controllers\FrontendController;

// ────────────────────────────────────────
// Frontend Public Routes
// ────────────────────────────────────────
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/packages', [FrontendController::class, 'packages'])->name('packages');
Route::get('/packages/{slug}', [FrontendController::class, 'packageDetail'])->name('packages.show');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/services/{slug}', [FrontendController::class, 'serviceDetail'])->name('services.show');
Route::get('/visa', [FrontendController::class, 'visa'])->name('visa');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
