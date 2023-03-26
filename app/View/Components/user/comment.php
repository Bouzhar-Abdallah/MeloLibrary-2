<?php

namespace App\View\Components\user;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class comment extends Component
{
    public $comment;
    public function __construct($comment)
    {
        $this->comment = $comment;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.comment');
    }
}
