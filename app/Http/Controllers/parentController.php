<?php

namespace App\Http\Controllers;

use App\Models\song;
use Illuminate\Http\Request;

class parentController extends Controller
{
    public function guestIndex()
    {
        $title = 'welcome';
        return view('guest.index',compact('title'));
    }
    public function userIndex()
    {
        $title = 'home';
        return view('user.index',compact('title'));
    }
    public function adminIndex()
    {
        $title = 'dashboard';
        return view(
            'admin.index',
            compact('title')
        );
    }
    public function createSong(Request $request)
    {
        $title = 'create song';
        return view(
            'admin.newSongView',
            compact('title')
        );
    }
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
    public function listSongs(){
        $songs = song::with('bands', 'genres', 'artists', 'writers')
        ->withAvg('song_ratings', 'rating')
        ->get();
        $songs = $this->arrangeData($songs);
        $title = 'all songs';
        return view('admin.allSongs',compact('title','songs'));
    }
}
