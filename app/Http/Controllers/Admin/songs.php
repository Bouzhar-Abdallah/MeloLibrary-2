<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
