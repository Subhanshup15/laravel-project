<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;


Route::get('/', function () {   
    return view('profile');
});


Route::get('/reasume', function () {
    return view('resume');
});



////middleware singe route//
Route::view('/','student')->Middleware('sagar');
Route::view('/add','add');
 
//group middleware
Route::controller(StudentController::class)->group(function(){
    Route::get('/', 'index')->Middleware('sagar');
    Route::get('/add', 'add');
    Route::get('/delete', 'delete');
});                                                                     

///////////user controller////////
Route::get('/user',[UserController::class,'updateData']);

////Route method////

//get, post, put, delete, patch, options, any, match//

// Route::get('/users', function () {return view('users');})->name('users');

// Route::post('/users', function () {return view('users');})->name('users');

// Route::put('/users', function () {return view('users');})->name('users');

// Route::delete('/users', function () {return view('users');})->name('users');

// Route::patch('/users', function () {return view('users');})->name('users');

// Route::options('/users', function () {return view('users');})->name('users');    


// Route::any('/users', function () {return view('users');})->name('users');

// Route::match(['get','post'],'/users', function () {return view('users');})->name('users');
    
//////Route Curd/////
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/create', [UserController::class, 'create']);
// Route::post('/users', [UserController::class, 'store']);    


/// CRUD operations, Laravel has a shortcut//


