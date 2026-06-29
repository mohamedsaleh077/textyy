<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

// Main Pages
Route::get('/', function () {
    return view('home');
});
Route::get('/posts', [PostController::class, 'index']);

Route::middleware('auth')->group(function () {
    // Post CRUD
    Route::post('/post/', [PostController::class, 'store']);
    Route::get('/post/edit/{post}', [PostController::class, 'edit']);
    Route::put('/post/{post}', [PostController::class, 'update']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);

    Route::post('/logout', Logout::class)->name('logout');
});

// Auth
Route::middleware('guest')->group(function () {
    Route::view('/signup', 'auth.signup')->name("register");
    Route::post('/signup', Register::class);
    Route::post('/login', Login::class)->name('login');
    Route::view('/search', 'search')->name('search');
    Route::post('/search', [PostController::class, 'show']);
});

Route::controller(UserProfileController::class)->group(function () {
    Route::get('/user/{id}', 'index');
});
