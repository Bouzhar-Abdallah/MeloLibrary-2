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

    public function arrangeData($playlists)
    {
        foreach ($playlists as $playlist) {
            foreach ($playlist->songs as $song) {
                $song_owners = [];

                foreach ($song->bands as $band) {
                    $song_owners[] = $band->name;
                }

                foreach ($song->artists as $artist) {
                    $song_owners[] = $artist->name;
                }

                $song->song_owners = $song_owners;

                $genre_names = [];
                foreach ($song->genres as $genre) {
                    $genre_names[] = $genre->name;
                }
                $song->genre_names = $genre_names;

                $writer_names = [];
                foreach ($song->writers as $writer) {
                    $writer_names[] = $writer->name;
                }
                $song->writer_names = $writer_names;
            }
        }
        return $playlists;
    }
    public function mount()
    {
        $this->user = Auth::user();
        
        $playlists = $this->user->playlists()
            ->withCount(['songs as tracks_count' => function ($query) {
                $query->where('archive', '!=', true);
            }])
            ->with([
                'songs' => function ($query) {
                    $query->where('archive', '!=', true);
                },
                'songs.bands', 'songs.genres', 'songs.artists', 'songs.writers'
            ])
            ->get();

        $this->playlists = $this->arrangeData($playlists);
        //dd($this->playlists[0]->songs);
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
