<?php

use Illuminate\Support\Facades\Route;

Route::view('/register', 'register')->name('register');
Route::view('/login', 'login')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');
