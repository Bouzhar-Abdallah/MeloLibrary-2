<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\Request;
use Cloudinary;

class ArtistController extends Controller
{
    public function update($id)
    {
        $artist = artist::find($id);
        return view('artist-form', compact('artist'));
    }
    public function edit(Request $request, $id)
    {
        /* https://res.cloudinary.com/doy8hfzvk/image/upload/v1677509717/image-not-available_zxhqhk.jpg */
        $artist = artist::find($id);
        $request->validate([
            'name' => 'required|max:20',
            'country' => 'required|max:20',
            'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
            'date_of_birth' => 'required'
        ]);

        $file = $request->file('cover');

        if ($request->has('cover')) {
            $result  = $file->storeOnCloudinary();

            
            $publicId = $artist->cover_id;
            Cloudinary::destroy($publicId);
            //$imageUrl = Cloudinary::upload($request->file('cover')->getRealPath())->getSecurePath();

            $artist->cover_url = $result->getPath();
            //getSecurePath();
            $artist->cover_id = $result->getPublicId();
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_of_birth = $request->date_of_birth;
            $artist->save();

            return redirect('/dashboard')->with('success', 'artist updated');
        } else {
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_of_birth = $request->date_of_birth;
            $artist->save();
            return redirect('/dashboard')->with('success', 'artist updated ');
        }
    }

    public function delete($id)
    {
        $artist = artist::find($id);
        $artist->delete();
        return redirect('/dashboard')->with('flashMessage', ['message' => 'artist deleted successfully', 'type' => 'success']);
    }
}
