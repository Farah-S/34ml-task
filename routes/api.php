<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\AchievementController;

Route::get('users/{user}/achievements', [AchievementController::class, 'achievements']);