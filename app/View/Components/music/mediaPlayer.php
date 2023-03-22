<?php

namespace App\View\Components\music;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mediaPlayer extends Component
{
    /**
     * Create a new component instance.
     */
    public $playing_playlist;
   
  
    public function __construct($playing_playlist = '')
{
   $this->playing_playlist = $playing_playlist;
   dd($this->playing_playlist);
}


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music.media-player');
    }
}
