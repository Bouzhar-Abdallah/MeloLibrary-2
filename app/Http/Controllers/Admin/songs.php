<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\song;
use Illuminate\Http\Request;
use Cloudinary;

class songs extends Controller
{
    protected $rules = [
        'title' => 'required',
        'cover' => 'required|file|mimes:png,jpg,jpeg,webp',
        'clip' => 'required|file|mimes:mp3,wav,ogg,m4a|max:5048',
        'genre' => 'required|array',
    ];

    public function saveSong(Request $request)
    {
        $request->validate($this->rules);

        $song = new song;

        $cover = $request->file('cover');
        $upload_cover_Result =  $cover->storeOnCloudinary();
        $cover_Url = $upload_cover_Result->getSecurePath();
        
        $clip = $request->file('clip');
        $upload_clip_Result =  $clip->storeOnCloudinary();
        $clip_Url = $upload_clip_Result->getSecurePath();


        /* $clip = $request->file('clip');
        $uploadClipResult = Cloudinary::uploadApi()->upload($clip->getPathname(), [
            "resource_type" => "auto",
        ]); */

        $audio = new \wapmorgan\Mp3Info\Mp3Info($clip, true);


        $song = Song::create([
            "title" => $request->title,
            "url" => $clip_Url,
            "cover_url" => $cover_Url,
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



        return redirect('dashboard')->with('flashMessage', ['message' => 'song added successfully', 'type' => 'success']);
    }
    
}
