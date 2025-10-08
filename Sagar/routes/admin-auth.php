    <?php

    use App\Http\Controllers\Admin\Auth\Adminlogin;

    use App\Http\Controllers\Admin\Auth\AdminRegisteredUserController;

    use Illuminate\Support\Facades\Route;

    Route::prefix('admin')->middleware('guest:admin')->group(function () {
        Route::get('register', [AdminRegisteredUserController::class, 'create'])->name('admin.register');

        Route::post('register', [AdminRegisteredUserController::class, 'store']);

        Route::get('login', [Adminlogin::class, 'create'])->name('admin.login');

        Route::post('login', [Adminlogin::class, 'store']);
    });

    Route::prefix('admin')->middleware('auth:admin')->group(function () {


        Route::get('/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');
        Route::post('logout', [Adminlogin::class, 'destroy'])->name('admin.logout');
    });
