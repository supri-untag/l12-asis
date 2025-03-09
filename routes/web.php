<?php

use Illuminate\Support\Facades\Route;

//Guest

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landingIndex');

Route::middleware('guest')->group( function () {
    Route::get('/sign-in', [\App\Http\Controllers\AuthenticationController::class, 'signIn'])->name('signInIndex');
    Route::post('/sign-in', [\App\Http\Controllers\AuthenticationController::class, 'signInProses'])->name('signInProses');
    Route::get('/sign-up', [\App\Http\Controllers\AuthenticationController::class, 'signUp'])->name('signUpIndex');
    Route::post('/sign-up', [\App\Http\Controllers\AuthenticationController::class, 'signUpProses'])->name('signUpProses');

});
Route::middleware(\App\Http\Middleware\AuthControlMiddleware::class)->group( function (){
    Route::get('/who-auth', function (){
        return true;
    })->name('AuthCheck');
});
Route::middleware(\App\Http\Middleware\AuthControlMiddleware::class)->group( function () {
    Route::prefix('/in-app')->group( function (){
        Route::get('', function () {
            return !\Illuminate\Support\Facades\Auth::check();
        })->name('in-app');
    });

});

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group( function () {
    Route::prefix('/admin')->group( function (){
        Route::get('/', function () {
            return "admin";
        })->name('adminIndex');
    });
});
Route::middleware(\App\Http\Middleware\StudentMiddleware::class)->group( function () {
    Route::prefix('/student')->group(function (){
        Route::get('/', function () {
            return "student";
        })->name('studentIndex');
    });
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/pasing', [\App\Http\Controllers\PasingTest::class, 'index']);

Route::get('/display', function () {
    return view('display');
});
//Route::get('/sign-in', function () {
//    return view('auth.sign-in');
//});
//Route::get('/sign-up', function () {
//    return view('auth.sign-up');
//});

Route::get('/admin/lecture', function () {
    return view('dashboard.admin.page.lecture.index');
});
Route::get('/admin/student', function () {
    return view('dashboard.admin.page.student.index');
});

Route::get('/admin/thesis', function () {
    return view('dashboard.admin.page.thesis.index');
});

Route::get('/admin/articles', function () {
    return view('dashboard.admin.page.articles.index');
});

Route::get('/admin/go_promise', function () {
    return view('dashboard.admin.page.go_promise.index');
});
Route::get('/admin/go_proposal', function () {
    return view('dashboard.admin.page.go_proposal.index');
});
Route::get('/admin/go_shp', function () {
    return view('dashboard.admin.page.go_shp.index');
});
Route::get('/admin/go_thesis', function () {
    return view('dashboard.admin.page.go_thesis.index');
});

//landing
Route::get('/land', function () {
    return view('landing.index');
});

//student
Route::get('/student/go_promise', function () {
    return view('dashboard.student.go_promise.index');
});

Route::get('/student/go_shp', function () {
    return view('dashboard.student.go_shp.index');
});

Route::get('/student/go_thesis', function () {
    return view('dashboard.student.go_thesis.index');
});

Route::get('/student/articles', function () {
    return view('dashboard.student.articles.index');
});
