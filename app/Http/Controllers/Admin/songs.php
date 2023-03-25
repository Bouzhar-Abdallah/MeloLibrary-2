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
        'lyrics' => 'required',
        'cover' => 'required|file|mimes:png,jpg,jpeg,webp',
        'clip' => 'required|file|mimes:mp3,wav,ogg,m4a|max:5048',
        'genre' => 'required|array',
    ];
    protected $rules_update = [
        'lyrics' => 'required',
        'title' => 'required',
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

        $selectedLanguageIds = $request->input('language', []);
        $song->languages()->attach($selectedLanguageIds);

        $selectedWriterIds = $request->input('writer', []);
        $song->writers()->attach($selectedWriterIds);

        return redirect('dashboard')->with('flashMessage', ['message' => 'song added successfully', 'type' => 'success']);
    }

    public function saveSongUpdated(Request $request, $id)
    {

        $request->validate($this->rules_update);

        $song = Song::find($id);

        if ($request->file('cover')) {

            $cover = $request->file('cover');
            $upload_cover_Result =  $cover->storeOnCloudinary();
            $cover_Url = $upload_cover_Result->getSecurePath();
            $song->cover_url = $cover_Url;
        }
        if ($request->file('clip')) {
            $clip = $request->file('clip');
            $upload_clip_Result =  $clip->storeOnCloudinary();
            $clip_Url = $upload_clip_Result->getSecurePath();
            $song->url = $clip_Url;
            $audio = new \wapmorgan\Mp3Info\Mp3Info($clip, true);
            $song->duration = $audio->duration;
        }


        $song->title = $request->title;
        $song->release_date = $request->release_date;
        $song->lyrics = $request->lyrics;

        $song->save();

        $selectedArtistIds = $request->input('artist', []);
        $song->artists()->detach();
        $song->artists()->attach($selectedArtistIds);

        $selectedWritersIds = $request->input('writer', []);
        $song->writers()->detach();
        $song->writers()->attach($selectedWritersIds);
        
        $selectedlanguagesIds = $request->input('language', []);
        $song->languages()->detach();
        $song->languages()->attach($selectedlanguagesIds);

        $selectedBandIds = $request->input('band', []);
        $song->bands()->detach();
        $song->bands()->attach($selectedBandIds);

        $selectedGenreIds = $request->input('genre', []);
        $song->genres()->detach();
        $song->genres()->attach($selectedGenreIds);
        return redirect('admin/songs/list')->with('flashMessage', ['message' => 'song updated successfully', 'type' => 'success']);
    }
}
