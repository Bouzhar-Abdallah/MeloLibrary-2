<?php

namespace App\Http\Livewire\User;

use App\Models\playlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Aside extends Component
{
    public $playlists;
    public $playing_playlist;
    public $user;

    public function setPlayingPlaylist($playlist)
    {
        $this->playing_playlist = $playlist;
        //dd($this->playing_playlist->name);

    }
    public function mount()
    {
        $this->user = Auth::user();
        //$this->playlists = $this->user->playlists();
        $this->playlists = $this->user->playlists()
        ->with('songs')
        ->with('songs.artists', 'songs.bands', 'songs.genres')
        ->get();

        if ($this->playlists->isEmpty()) {
            // Handle the case when there are no playlists
            $this->playing_playlist = null;
        } else {
            $this->playing_playlist = $this->playlists[0];
        }
    }
    public function render()
    {
        return view('livewire.user.aside');
    }
}
