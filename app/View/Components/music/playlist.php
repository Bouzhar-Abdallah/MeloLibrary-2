<?php

namespace App\View\Components\music;

use App\Models\playlist as ModelsPlaylist;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class playlist extends Component
{
    /**
     * Create a new component instance.
     */
    public $playlists;
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
        
        //$this->playlists = $this->user->playlists();
        $this->playlists = $this->user->playlists()->with('songs')->get();
        //$this->playlists = $this->user->with('playlists.songs');

        /* foreach ($user->playlists as $playlist) {
            echo "Playlist Name: " . $playlist->name . PHP_EOL;
            echo "Songs:" . PHP_EOL;

            foreach ($playlist->songs as $song) {
                echo "- " . $song->title . PHP_EOL;
            }

            echo PHP_EOL;
        } */

       //dd($this->playlists);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music.playlist');
    }
}
