<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Course;

class HomeCourse extends Component
{
    public Course $course;
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.home-course');
    }
}
