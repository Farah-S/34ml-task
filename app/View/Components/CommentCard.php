<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Comment;

class CommentCard extends Component
{
    public $comment;
    public string $name='';

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.comment-card');
    }
}
