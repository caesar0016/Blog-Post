<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('posts.index');
})->name('home');

Route::view('/register', 'auth.register')->name('register');

Route::view('/login', 'auth.login')->name('login');

Route::view('/contacts', 'header.contacts')->name('contacts');

Route::view
('/about','header.about')->name('about');

//{{-- Here lies the controller woosh --}}

Route::post('register', [AuthController::class, 'rehistro']);