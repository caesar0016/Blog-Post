<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Redirect the homepage to posts
Route::redirect('/', 'posts');

// Posts resource route
Route::resource('posts', PostController::class);

// Profile route for authenticated users
Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');  // Profile page for logged-in users
    Route::view('/about', 'header.about')->name('about');
    Route::view('/contacts', 'header.contacts')->name('contacts');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Routes for guests (unauthenticated users)
Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});
?>
