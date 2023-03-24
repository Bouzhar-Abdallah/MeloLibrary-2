<?php

namespace App\Http\Livewire;

use App\Models\song;
use Livewire\Component;

class AdminSongsTable extends Component
{
    public $songs;
    public function arrangeData($songs){
        
            foreach ($songs as $song) {
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
        
        return $songs;
    }
    public function mount(){
        
        $songs = song::with('bands', 'genres', 'artists', 'writers')
        ->withAvg('song_ratings', 'rating')
        ->get();
        $this->songs = $this->arrangeData($songs);
    }
    public function render()
    {
        return view('livewire.admin-songs-table');
    }
}
