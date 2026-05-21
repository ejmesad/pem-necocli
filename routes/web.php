<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuellasController;
use App\Http\Controllers\Panel\HuellaSubmitController;
use App\Http\Controllers\Admin\HuellaModerationController;
use App\Http\Controllers\SchoolController;

// ── Página pública principal ───────────────────────────────────────────────
Route::get('/', function () {
    return view('home');
})->name('home');

// ── Zona pública — Huellas ─────────────────────────────────────────────────
Route::get('/nuestras-huellas', [HuellasController::class, 'index'])->name('huellas.index');
Route::get('/nuestras-huellas/{post}', [HuellasController::class, 'show'])->name('huellas.show');

// ── M5 — Colegios (públicas) ───────────────────────────────────────────────
Route::prefix('colegios')->name('colegios.')->group(function () {
    Route::get('/',              [SchoolController::class, 'index'])->name('index');
    Route::get('/{school:slug}', [SchoolController::class, 'show'])->name('show');
});

// ── Dashboard (cualquier usuario autenticado) ──────────────────────────────
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ── Panel — Rector, Editor, Admin Mesa, Superadmin ─────────────────────────
// OI-017 resuelto: role middleware protege todas las rutas del panel
Route::middleware(['auth', 'role:rector|editor|admin_mesa|superadmin'])
    ->prefix('panel')
    ->name('panel.')
    ->group(function () {
        Route::get('huellas/nueva',      [HuellaSubmitController::class, 'create'])->name('huellas.create');
        Route::post('huellas',           [HuellaSubmitController::class, 'store'])->name('huellas.store');
        Route::get('huellas/mis-envios', [HuellaSubmitController::class, 'index'])->name('huellas.index');
    });

// ── Admin — Moderación (solo admin_mesa y superadmin) ─────────────────────
// OI-017 resuelto: role middleware protege todas las rutas de admin
Route::middleware(['auth', 'role:admin_mesa|superadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('huellas/moderacion',         [HuellaModerationController::class, 'index'])->name('huellas.moderation');
        Route::patch('huellas/{post}/approve',   [HuellaModerationController::class, 'approve'])->name('huellas.approve');
        Route::patch('huellas/{post}/reject',    [HuellaModerationController::class, 'reject'])->name('huellas.reject');
        Route::patch('huellas/{post}/feature',   [HuellaModerationController::class, 'feature'])->name('huellas.feature');
        Route::get('huellas/publicadas',         [HuellaModerationController::class, 'published'])->name('huellas.published');
    });

require __DIR__.'/auth.php';