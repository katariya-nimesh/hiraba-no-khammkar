<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PublicApplicationController;
use App\Http\Controllers\Admin\ApplicationExportController;

// Authentication Routes
// Auth::routes(['register' => false]); // Disable registration

Route::get('/hnk-admin-login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/hnk-admin-login', [LoginController::class, 'login'])
    ->name('admin.login.submit');


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
         Route::put(
            '/installments/{installment}',
            [ApplicationController::class, 'update']
        )->name('installments.update');
    });
});

Route::get('/application', [PublicApplicationController::class, 'create'])
    ->name('public.application.create');

Route::post('/application', [PublicApplicationController::class, 'store'])
    ->name('public.application.store');

Route::get('/', [PublicApplicationController::class, 'homePage'])
    ->name('public.application.homePage');
