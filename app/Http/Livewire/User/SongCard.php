<?php

namespace App\Http\Livewire\User;

use App\Models\song;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SongCard extends Component
{
    public $song;
    public $songOwners;
    public $playlists;
    public $alreadyRated;
    public function mount($id)
    {
        
        $this->alreadyRated = Auth::user()->ratings()->wherePivot('song_id', $id)->first();
        $this->song = song::with('bands', 'genres', 'artists', 'writers')
            ->withAvg('song_ratings', 'rating')
            ->find($id);
        $this->playlists = Auth::user()->playlists;
        $artistNames = $this->song->artists->pluck('name')->toArray();
        $bandNames = $this->song->bands->pluck('name')->toArray();
        $this->songOwners = implode(' ft ', array_merge($artistNames, $bandNames));
        
    }
    public function render()
    {
        return view('livewire.user.song-card');
    }
}
