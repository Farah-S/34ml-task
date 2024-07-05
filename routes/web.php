<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Middleware\FetchCoursesMiddleware;
use App\Http\Middleware\IsEnrolledMiddleware;


Route::get('/', function () {
    return view('home');
})->middleware(FetchCoursesMiddleware::class);

Route::get('/course/{course}', [CourseController::class, 'show'])->name('course');

Route::get('/enrolledCheck/{lesson}', [LessonController::class, 'check'])->middleware(['auth'])->name('enrolledCheck');
Route::get('/lesson', [LessonController::class, 'show'])->name('lesson');

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

// Route::view('lesson/{lesson}', 'enrolledCheck')
//     ->middleware(['auth'])->middleware(IsEnrolledMiddleware::class)
//     ->name('lesson');

require __DIR__.'/auth.php';
