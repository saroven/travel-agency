<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\VisaController;

// ────────────────────────────────────────
// Public API Routes (no auth required)
// ────────────────────────────────────────

// Leads — frontend form submissions
Route::post('/leads', [LeadController::class, 'store']);

// Packages — live search/filter
Route::get('/packages', [PackageController::class, 'index']);
Route::get('/packages/{slug}', [PackageController::class, 'show']);

// Visa calculator
Route::get('/visa/{country}/{occupation}', [VisaController::class, 'calculate']);
