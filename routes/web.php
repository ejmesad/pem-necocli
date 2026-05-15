<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuellasController;
use App\Http\Controllers\Panel\HuellaSubmitController;
use App\Http\Controllers\Admin\HuellaModerationController;

// Página pública principal
Route::get('/', function () {
    return view('home');
});

// Zona pública - Huellas
Route::get('/nuestras-huellas', [HuellasController::class, 'index'])->name('huellas.index');
Route::get('/nuestras-huellas/{post}', [HuellasController::class, 'show'])->name('huellas.show');

// Panel (Rector, Editor, Admin)
Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {
    Route::get('huellas/nueva', [HuellaSubmitController::class, 'create'])->name('huellas.create');
    Route::post('huellas', [HuellaSubmitController::class, 'store'])->name('huellas.store');
    Route::get('huellas/mis-envios', [HuellaSubmitController::class, 'index'])->name('huellas.index');
});

// Admin - Moderación
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('huellas/moderacion', [HuellaModerationController::class, 'index'])->name('huellas.moderation');
    Route::patch('huellas/{post}/approve', [HuellaModerationController::class, 'approve'])->name('huellas.approve');
    Route::patch('huellas/{post}/reject', [HuellaModerationController::class, 'reject'])->name('huellas.reject');
    Route::patch('huellas/{post}/feature', [HuellaModerationController::class, 'feature'])->name('huellas.feature');
    Route::get('huellas/publicadas', [HuellaModerationController::class, 'published'])->name('huellas.published');
});
Route::get('/test-layout', function () {
    return view('test-layout');
});

// Dashboard
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
