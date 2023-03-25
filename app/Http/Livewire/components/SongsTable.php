<?php

namespace App\Http\Livewire\Components;

use App\Models\song;
use Livewire\Component;

class SongsTable extends Component
{
    public $inputfield = '';
    public $songs;
    public function arrangeData($songs)
    {

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
    public function updatedInputfield()
    {
        $this->songs = $this->arrangeData(song::where(function($query) {
        $query->where('title', 'like', '%' . $this->inputfield . '%')
              ->orWhere('release_date', 'like', '%' . $this->inputfield . '%')
              ->orWhere('lyrics', 'like', '%' . $this->inputfield . '%');
    })
    ->with('bands', 'genres', 'artists', 'writers')
    ->withAvg('song_ratings', 'rating')
    ->get());
    }
    public function mount()
    {

        $this->songs = $this->arrangeData(song::where(function($query) {
        $query->where('title', 'like', '%' . $this->inputfield . '%')
              ->orWhere('release_date', 'like', '%' . $this->inputfield . '%')
              ->orWhere('lyrics', 'like', '%' . $this->inputfield . '%');
    })
    ->with('bands', 'genres', 'artists', 'writers')
    ->withAvg('song_ratings', 'rating')
    ->get());
        //dd(['songs' =>$this->songs, 'search' => $this->search]);
        //dd($this->songs);
    }
    public function render()
    {
        return view('livewire.components.songs-table', ['songs' => $this->arrangeData(song::where(function($query) {
        $query->where('title', 'like', '%' . $this->inputfield . '%')
              ->orWhere('release_date', 'like', '%' . $this->inputfield . '%')
              ->orWhere('lyrics', 'like', '%' . $this->inputfield . '%');
    })
    ->with('bands', 'genres', 'artists', 'writers')
    ->withAvg('song_ratings', 'rating')
    ->get())]);
    }
}

/* 
to use relations in search
song::where(function($query) {
        $query->where('title', 'like', '%' . $this->inputfield . '%')
              ->orWhere('release_date', 'like', '%' . $this->inputfield . '%')
              ->orWhere('lyrics', 'like', '%' . $this->inputfield . '%');
    })
    ->whereHas('bands', function($query) {
        $query->where('name', 'like', '%' . $this->inputfield . '%');
    })
    ->orWhereHas('genres', function($query) {
        $query->where('name', 'like', '%' . $this->inputfield . '%');
    })
    ->orWhereHas('artists', function($query) {
        $query->where('name', 'like', '%' . $this->inputfield . '%');
    })
    ->orWhereHas('writers', function($query) {
        $query->where('name', 'like', '%' . $this->inputfield . '%');
    })
    ->with('bands', 'genres', 'artists', 'writers')
    ->withAvg('song_ratings', 'rating')
    ->get();
 */