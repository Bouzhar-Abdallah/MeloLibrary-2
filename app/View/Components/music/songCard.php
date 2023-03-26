<?php

namespace App\View\Components\music;

use App\Models\song;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class songCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $song;
    public $playlists;
    public function __construct($song_id = 2)
    {
        
        $this->song = song::find($song_id);
        $this->playlists = Auth::user()->playlists;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music.song-card');
    }
}
