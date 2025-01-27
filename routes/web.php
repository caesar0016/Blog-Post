<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

Route::redirect('/', 'posts');

Route::resource('posts', PostController::class);


// Routes for authenticated users
Route::middleware('auth')->group(function() {
    Route::view('/about', 'header.about')->name('about');
    Route::view('/contacts', 'header.contacts')->name('contacts');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
});

// Routes for guests (unauthenticated users)
Route::middleware('guest')->group(function() {
    // Register and Login pages
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

?>