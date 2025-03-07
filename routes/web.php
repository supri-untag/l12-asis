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

Route::get('/admin/lecture', function () {
    return view('dashboard.admin.page.lecture.index');
});
