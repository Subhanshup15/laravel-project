<?php

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ElementController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PortfolioController;
use App\Http\Controllers\frontend\ServicesController;

use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/port', [PortfolioController::class, 'index']);
Route::get('/serv', [ServicesController::class, 'index']);
Route::get('/elements', [ElementController::class, 'index']);


