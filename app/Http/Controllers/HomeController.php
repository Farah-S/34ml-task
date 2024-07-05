<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('lessons')->get();
        $courses->each(function ($course) {
            $course->lessons = $course->lessons->sortBy('order');
        });
        return view('home', compact('courses'));
    }
}
