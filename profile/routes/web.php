<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

///////////