<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AchievementController;

Route::get('users/{user}/achievements', [AchievementController::class, 'achievements']);