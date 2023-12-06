<?php

use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ------------------------------------
// Nama  : Hasin Bashari Panansah
// Nim   : 10121187
// Kelas : IF - 5
// ------------------------------------

Route::get('/', [HomeController::class, 'index'])->name('landing-page');

Route::group(['prefix' => 'blog'], function() {
    Route::get('/', [HomeController::class, 'blog'])->name('blog');
    Route::get('/{title}', [HomeController::class, 'blogDetail'])->name('blog-detail');
});

// From laravel auth
Auth::routes();

// For logged in users
Route::group(['middleware' => 'auth'], function() {

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Category Post
    Route::resource('post-category', PostCategoryController::class);

    // User
    Route::resource('user', UserController::class);

    // Post
    Route::resource('post', PostController::class);

    // Profile
    Route::resource('profile', ProfileController::class);
});

