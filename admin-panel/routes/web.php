<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware; // Ensure this import is present

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin routes
    Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function () {
        Route::get('/users', [AdminController::class, 'index'])->name('admin.users');
        Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    });
});