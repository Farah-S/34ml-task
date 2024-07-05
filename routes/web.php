<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::view('editprofile', 'editprofile')
    ->middleware(['auth'])
    ->name('editprofile');

Route::view('course', 'course')
    ->middleware(['auth'])
    ->name('course');

require __DIR__.'/auth.php';
