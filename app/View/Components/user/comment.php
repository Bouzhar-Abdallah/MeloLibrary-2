<?php

namespace App\View\Components\user;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class comment extends Component
{
    public $comment;
    public $days_passed;
    public function __construct($comment)
    {
        $this->comment = $comment;
        $created_at = Carbon::parse($comment->created_at);
        $today = Carbon::today();

        $this->days_passed = $created_at->diffInDays($today);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.comment');
    }
}
