<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Lesson;

class LessonListItem extends Component
{
    public Lesson $lesson;
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.lesson-list-item');
    }
}
