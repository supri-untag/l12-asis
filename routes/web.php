<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/display', function () {
    return view('display');
});
Route::get('/sign-in', function () {
    return view('auth.sign-in');
});
Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

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
