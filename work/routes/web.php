<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContriller;

Route::get('/', [HomeContriller::class, 'show']);

Route::prefix('sagar')->name('sagar.')->group(function () {
  Route::get('/', [HomeContriller::class, 'show']);
  Route::get('/add', [HomeContriller::class, 'adduser'])->name('add');
  Route::post('/adduser', [HomeContriller::class, 'store'])->name('store');
});
