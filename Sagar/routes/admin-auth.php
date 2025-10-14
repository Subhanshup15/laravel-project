    <?php

    use App\Http\Controllers\Admin\Auth\Adminlogin;

    use App\Http\Controllers\Admin\Auth\AdminRegisteredUserController;
    use App\Http\Controllers\Admin\AboutController;
    use App\Http\Controllers\Admin\NewsletterController;
    use App\Http\Controllers\Admin\ProjectController;
    use App\Http\Controllers\Admin\ServiceController;
    use App\Http\Controllers\Admin\TestimonialController;
    use App\Http\Controllers\Admin\CodeLanguagesController;


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
        })->name('dashboard');

        Route::get('/home', function () {
            return view('admin.home');
        })->name('home');


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
        // Language CRUD
        Route::resource('language', CodeLanguagesController::class);


        // about

        Route::post('logout', [Adminlogin::class, 'destroy'])->name('logout');
    });
