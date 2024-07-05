<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use Illuminate\Support\Facades\View;

class FetchCoursesMiddleware
{
    public function handle($request, Closure $next)
    {
        $courses = Course::with('lessons')->get();
        $courses->each(function ($course) {
            $course->lessons = $course->lessons->sortBy('order');
        });
        
        View::share('courses', $courses); // Share courses with all views

        return $next($request);
    }
}
?>