<?php
use App\Http\Controllers\Admin\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Models\Portfolio;

// Public Frontend
Route::get('/', function () {
    $portfolio = Portfolio::first();
    return view('welcome', compact('portfolio'));
});

// Auth routes (Laravel Breeze)
require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('portfolios', PortfolioController::class);
});

// User Routes
Route::middleware(['auth','user'])->prefix('user')->name('user.')->group(function() {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});
