<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\FetchCoursesMiddleware;


Route::get('/', function () {
    return view('home');
})->middleware(FetchCoursesMiddleware::class);

Route::get('/course/{course}', [CourseController::class, 'show'])->name('course');

Route::post('/enroll', [UserController::class, 'enroll'])->name('course.enroll');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('editprofile', 'editprofile')
    ->middleware(['auth'])
    ->name('editprofile');

// Route::view('course', 'course')
//     ->middleware(['auth'])
//     ->name('course');

// TODO: add middleware to check if enrolled in course
Route::view('lesson', 'lesson')
    ->middleware(['auth'])
    ->name('lesson');

require __DIR__.'/auth.php';
