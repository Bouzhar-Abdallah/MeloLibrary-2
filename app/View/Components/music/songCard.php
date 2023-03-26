<?php

namespace App\View\Components\music;

use App\Models\song;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SongCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $song;
    public $songOwners;
    public $playlists;
    public function __construct(int $id)
    {
        $this->song = song::with('bands', 'genres', 'artists', 'writers')
            ->withAvg('song_ratings', 'rating')
            ->find($id);
        $this->playlists = Auth::user()->playlists;
        $artistNames = $this->song->artists->pluck('name')->toArray();
        $bandNames = $this->song->bands->pluck('name')->toArray();
        $this->songOwners = implode(' ft ', array_merge($artistNames, $bandNames));
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music.song-card');
    }
}
