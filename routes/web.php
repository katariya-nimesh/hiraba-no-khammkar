<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PublicApplicationController;
use App\Http\Controllers\Admin\ApplicationExportController;
use App\Http\Controllers\CityController;

// Authentication Routes
// Auth::routes(['register' => false]); // Disable registration

Route::get('/hnk-admin-login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/hnk-admin-login', [LoginController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Admin Routes - Protected by auth middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Applications
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/export', ApplicationExportController::class)->name('applications.export');
        Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
        Route::post('/applications/{id}/update-status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
        Route::get('/applications/{id}/download/{document}', [ApplicationController::class, 'downloadDocument'])->name('applications.download');
        Route::put('/installments/{installment}', [ApplicationController::class, 'update'])->name('installments.update');

        // Cities
        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::post('/cities/update-status/{id?}', [CityController::class, 'updateStatus'])->name('cities.updateStatus');
    });
});

// ─── Public Application Routes ─────────────────────────────────────────────────

// Home Page
Route::get('/', [PublicApplicationController::class, 'homePage'])
    ->name('public.application.homePage');

// Lifetime Scholarship Form  (one-time submission per student, fee ₹1250)
Route::get('/application/lifetime', [PublicApplicationController::class, 'createLifetime'])
    ->name('public.application.lifetime.create');

Route::post('/application/lifetime', [PublicApplicationController::class, 'storeLifetime'])
    ->name('public.application.lifetime.store');

// One-Time Scholarship Form (periodic/yearly, fee ₹250)
Route::get('/application/one-time', [PublicApplicationController::class, 'createOneTime'])
    ->name('public.application.onetime.create');

Route::post('/application/one-time', [PublicApplicationController::class, 'storeOneTime'])
    ->name('public.application.onetime.store');

// Payment Pending Page (shown after successful form submission, before payment)
Route::get('/application/payment-pending', [PublicApplicationController::class, 'paymentPending'])
    ->name('public.application.payment.pending');

// Legacy route — kept for backward compatibility, redirects to lifetime form
Route::get('/application', [PublicApplicationController::class, 'createLifetime'])
    ->name('public.application.create');
