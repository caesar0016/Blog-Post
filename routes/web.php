<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.index');
})->name('home');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/contacts', function () {
    return view('header.contacts');
})->name('contacts');

Route::get('/about', function(){
    return view('header.about');
})->name('about');