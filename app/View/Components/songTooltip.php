<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class songTooltip extends Component
{
    /**
     * Create a new component instance.
     */
    public $song ;
    public function __construct($song)
    {
        $this->song = $song;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.song-tooltip');
    }
}
