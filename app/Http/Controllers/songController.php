<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Cloudinary;


class SongController extends Controller
{
    public function test()
    {
        return back()->with('info','Item created successfully!');
    }
    public function index(Request $request): View
    {
        
        //$songs = song::all();
        $songs = Song::with('artists', 'genres', 'bands')->get();

        /* 
        echo '<pre>';
        var_dump($songs[1]->bands);
        echo '</pre>'; 
        die();
        */
        
        return view(
            'song.new',
            ['songs' => $songs]
        );
    }

    public function update($id){
        
        dd($id);
    }
    public function save(Request $request)
    {
        $file = $request->file('cover');
        $uploadResult =  Cloudinary::UploadApi()->upload($file->getPathname());
        $imageUrl = $uploadResult['secure_url'];


        $clip = $request->file('clip');
        $uploadClipResult = Cloudinary::uploadApi()->upload($clip->getPathname(), [
            "resource_type" => "auto",
        ]);
        $clipUrl = $uploadClipResult['secure_url'];
        
        $audio = new \wapmorgan\Mp3Info\Mp3Info($clip, true);
        

        $song = Song::create([
            "title" => $request->title,
            "url" => $clipUrl,
            "cover_url" => $imageUrl,
            "duration" => $audio->duration,
            "release_date" => $request->release_date,
            "lyrics" => $request->lyrics
        ]);

        $selectedArtistIds = $request->input('artist', []);
        $song->artists()->attach($selectedArtistIds);

        $selectedBandIds = $request->input('band', []);
        $song->bands()->attach($selectedBandIds);

        $selectedGenreIds = $request->input('genre', []);
        $song->genres()->attach($selectedGenreIds);



        return redirect('/admin/song/new');
    }
}
