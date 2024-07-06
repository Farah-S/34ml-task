<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Middleware\FetchCoursesMiddleware;
use App\Http\Middleware\FetchUserDetailsMiddleware;


Route::get('/', function () {
    return view('home');
})->middleware(FetchCoursesMiddleware::class)->name('home');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->middleware(FetchUserDetailsMiddleware::class)->name('profile');

Route::get('/course/{course}', [CourseController::class, 'show'])->name('course');

Route::get('/enrolledCheck/{lesson}', [LessonController::class, 'check'])->middleware(['auth'])->name('enrolledCheck');
Route::get('/lesson', [LessonController::class, 'show'])->name('lesson');
Route::post('/lessonUpdate', [LessonController::class, 'update'])->name('lessons.update');

Route::post('/enroll', [UserController::class, 'enroll'])->middleware(['auth'])->name('course.enroll');

Route::post('/comment', [CommentController::class, 'store'])->name('comment');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::view('editprofile', 'editprofile')
    ->middleware(['auth'])
    ->name('editprofile');

Route::get('/read-notifications=', [NotificationController::class, 'markAsRead'])->name('markNotificationAsRead');

require __DIR__.'/auth.php';
