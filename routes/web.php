<?php

use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ------------------------------------
// Nama  : Hasin Bashari Panansah
// Nim   : 10121187
// Kelas : IF - 5
// ------------------------------------

Route::get('/', function () {
    return view('welcome');
});

// From laravel UI
Auth::routes();

// For logged in users
Route::group(['middleware' => 'auth'], function() {
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Category Post
    Route::resource('post-category', PostCategoryController::class);

    // User
    Route::resource('user', UserController::class);

    // Post
    Route::resource('post', PostController::class);
});

