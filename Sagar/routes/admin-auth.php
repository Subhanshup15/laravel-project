    <?php

    use App\Http\Controllers\Admin\Auth\Adminlogin;

    use App\Http\Controllers\Admin\Auth\AdminRegisteredUserController;
    use App\Http\Controllers\Admin\AboutController;
    use App\Http\Controllers\Admin\NewsletterController;
    use App\Http\Controllers\Admin\ProjectController;
    use App\Http\Controllers\Admin\ServiceController;
    use App\Http\Controllers\Admin\TestimonialController;


    use Illuminate\Support\Facades\Route;

    Route::prefix('admin')->middleware('guest:admin')->group(function () {
        Route::get('register', [AdminRegisteredUserController::class, 'create'])->name('admin.register');
        Route::post('register', [AdminRegisteredUserController::class, 'store']);
        Route::get('login', [Adminlogin::class, 'create'])->name('admin.login');
        Route::post('login', [Adminlogin::class, 'store']);
    });

    Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {


        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Route::get('/home', function () {
        //     return view('admin.home');
        // })->name('admin.home');

        // Route::get('/about', function () {
        //     return view('admin.about');
        // })->name('admin.about');

        //  Route::get('/service', function () {
        //     return view('admin.service');
        // })->name('admin.service');

        //  Route::get('/portfolio', function () {
        //     return view('admin.portfolio');
        // })->name('admin.portfolio');
  
         // About CRUD
    Route::resource('abouts', AboutController::class);

    // Services CRUD
    Route::resource('services', ServiceController::class);

    // Projects CRUD
    Route::resource('projects', ProjectController::class);

    // Testimonials CRUD
    Route::resource('testimonials', TestimonialController::class);

    // Newsletter CRUD
    Route::resource('newsletters', NewsletterController::class);


        // about

        Route::post('logout', [Adminlogin::class, 'destroy'])->name('logout');
    });


