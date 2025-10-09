<?php

use App\Http\Controllers\frontend\PortfolioController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ElementController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\ProfileController;


use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



///////frontend //

Route::get('/', [HomeController::class, 'index']);
Route::get('/port', [PortfolioController::class, 'index']);
Route::get('/serv', [ServicesController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/elements', [ElementController::class, 'index']);



require __DIR__ . '/auth.php';

require __DIR__ . '/admin-auth.php';
