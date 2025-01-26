<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//this is middleware that prevents guest cocming into this modules
Route::middleware('auth')->group(function(){
    
    Route::view('/about','header.about')->name('about');
    Route::view('/contacts', 'header.contacts')->name('contacts');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});

Route::middleware('guest')->group(function(){
    
    Route::get('/', function () {
        return view('posts.index');
    })->name('home');

    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);    

});