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
Route::middleware('auth')->group( function () {
    Route::post('/sign-out', [\App\Http\Controllers\AuthenticationController::class, 'signOut'])->name('signOut');
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
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'adminIndex'])->name('adminIndex');
    });
});

Route::middleware(\App\Http\Middleware\StudentMiddleware::class)->group( function () {
    Route::prefix('/student')->group(function (){
        Route::get('/',[\App\Http\Controllers\StudentController::class, 'Index'])->name('studentIndex');
        Route::get('/go_promise', [\App\Http\Controllers\GoPromiseController::class,'StudentGoPromise'])->name('StudentGoPromise');
        Route::post('/go_promise', [\App\Http\Controllers\GoPromiseController::class,'StudentGoPromiseAdd'])->name('StudentGoPromiseAdd');
        Route::get('/go_shp', [\App\Http\Controllers\GoShpController::class,'StudentGoSHP'])->name('StudentGoSHP');
        Route::get('/go_proposal', [\App\Http\Controllers\GoProposalController::class, 'StudentGoProposal'])->name('StudentGoProposal');
        Route::get('go_thesis', [\App\Http\Controllers\GoThesisController::class, 'StudentGoThesis'])->name('StudentGoThesis');
        Route::get('/articles', [\App\Http\Controllers\ArticlesController::class, 'StudentArticles'])->name('StudentArticles');
    });
});

Route::get('/pasing', [\App\Http\Controllers\PasingTest::class, 'index']);

Route::prefix('/admin')->group( function (){
    Route::get('lecture', [\App\Http\Controllers\LectureController::class,'lectureIndex'])->name('lectureIndex');
    Route::get('student', [\App\Http\Controllers\StudentController::class,'studentIndexDash'])->name('studentIndexDash');
    Route::get('thesis', [\App\Http\Controllers\ThesisController::class,'thesisIndex'])->name('thesisIndex');
    Route::get('/go_promise', [\App\Http\Controllers\GoPromiseController::class,'AdminGoPromise'])->name('AdminGoPromise');
    Route::post('/go_promise_getByID', [\App\Http\Controllers\GoPromiseController::class,'AdminGoPromiseGetByID'])->name('AdminGoPromiseGetByID');
    Route::post('/go_promise_accept', [\App\Http\Controllers\GoPromiseController::class,'AdminGoPromiseAccept'])->name('AdminGoPromiseAccept');
    Route::post('/go_promise_revision', [\App\Http\Controllers\GoPromiseController::class,'AdminGoPromiseRevision'])->name('AdminGoPromiseRevision');
    Route::get('/go_proposal', [\App\Http\Controllers\GoProposalController::class,'AdminGoProposal'])->name('AdminGoProposal');
    Route::get('/go_shp', [\App\Http\Controllers\GoShpController::class,'AdminGoShp'])->name('AdminGoShp');
    Route::get('/go_thesis', [\App\Http\Controllers\GoThesisController::class,'AdminGoThesis'])->name('AdminGoThesis');
});


Route::get('/admin/articles', function () {
    return view('dashboard.admin.page.articles.index');
});
