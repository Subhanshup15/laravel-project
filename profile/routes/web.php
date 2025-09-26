<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FromController;
use App\Http\Controllers\Session;
use App\Http\Controllers\Uplodefile;
use Illuminate\Support\Facades\App;


/////////// add student///


Route::view('addStudent', 'addStudent');
Route::post('addStudent', [StudentController::class, 'addStudent'])->name('students.store');
Route::get('studentlist', [StudentController::class, 'studentlist']);
Route::get('editStudent/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('updateStudent/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('deleteStudent/{id}', [StudentController::class, 'delete'])->name('students.destroy');
///seach input///
Route::get('students', [StudentController::class, 'search'])->name('students.index');
///bulk delete///
Route::delete('/students/bulk-delete', [StudentController::class, 'bulkDelete'])->name('students.bulkDelete');







    







//////////////////
Route::get('/', function () {
    return view('profile');
});


Route::get('/reasume', function () {
    return view('resume');
});



////middleware singe route//
Route::view('/student', 'student')->Middleware('sagar');
Route::view('/add', 'add');

//group middleware
Route::controller(StudentController::class)->group(function () {
    Route::get('/index', 'index')->Middleware('sagar');
    // Route::get('/add', 'add');
    // Route::get('/delete', 'delete');
});

///////////user controller////////
// Route::get('/user',[UserController::class,'updateData']);

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



///http request////

// Show the form
Route::view('form', 'form');

// Store form data
Route::post('addform', [FromCOntroller::class, 'login']);

///////////////session///////////////
Route::view('session', 'session');
Route::post('login', [Session::class, 'login']);

/////session logout/////
Route::get('logout', [Session::class, 'logout']);

////flash session////
Route::view('flash', 'flash');
Route::post('addflash', [FromCOntroller::class, 'flashLogin']);
////end flash session////


////uplode file/////
Route::view('uplodefile', 'uplode');
Route::post('addfile', [Uplodefile::class, 'fileUplode']);
////end uplode file/////



///////////localization//////////

Route::view('langprofile', 'langprofile');

Route::get('langprofile/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('langprofile');
});

///////////end localization//////////   

////    middleware group/////
Route::middleware(['Setlang'])->group(function () {
    ///view method///
    Route::view('langprofile', 'langprofile');
    //// without session//
    Route::get('langprofile/{lang}', function ($lang) {
        App::setlocale($lang);
        return view('langprofile');
    });


    // with session 
    Route::get('Setlang/{lang}', function ($lang) {
        session()->put('lang', $lang);
        return redirect('langprofile');
    });
});
////end middleware group/////   
