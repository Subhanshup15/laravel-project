<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserQuizController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ProfileController;

// Welcome Page
Route::get('/', fn() => view('welcome'));

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserQuizController::class, 'dashboard'])->name('dashboard');
    Route::get('/quiz/{category_id}', [UserQuizController::class, 'startQuiz'])->name('user.quiz');
    Route::post('/quiz/{category_id}', [UserQuizController::class, 'submitQuiz'])->name('user.quiz.submit');

    // Profile
    Route::view('profile', 'profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Super Admin Routes
Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/login', [SuperAdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SuperAdminController::class, 'login']);
    Route::post('/logout', [SuperAdminController::class, 'logout'])->name('logout');

    Route::middleware('auth:superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');

        // Super Admin CRUD
        Route::resource('users', SuperAdminController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('categories', SuperAdminController::class);
        Route::resource('quizzes', SuperAdminController::class);
    });
});

require __DIR__ . '/auth.php';
