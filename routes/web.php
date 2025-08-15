<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman Tamu
Route::get('/', [GuestController::class, 'create'])->name('guest.create');
Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard dan Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Guests
    Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');
    Route::get('/guests/{guest}', [GuestController::class, 'show'])->name('guests.show');
    Route::get('/guests/{guest}/edit', [GuestController::class, 'edit'])->name('guests.edit');
    Route::put('/guests/{guest}', [GuestController::class, 'update'])->name('guests.update');
    Route::delete('/guests/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');
    Route::get('/guests/export/pdf', [GuestController::class, 'exportPdf'])->name('guests.export.pdf');

    // Teachers
    Route::resource('teachers', TeacherController::class);
    Route::get('/teachers/export/pdf', [TeacherController::class, 'exportPdf'])->name('teachers.export.pdf');

    // Users
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('users', UserController::class);
    });

    // Export System
    Route::get('/export', [ExportController::class, 'index'])->name('export.index');
    Route::post('/export/generate', [ExportController::class, 'generate'])->name('export.generate');
});
