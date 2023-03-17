<?php

namespace App\Http\Controllers;

use App\Models\band;
use Illuminate\Http\Request;
use Cloudinary;

class BandController extends Controller
{
    public function update($id){
        $artist = band::find($id);
        return view('band-form',compact('artist'));
    }
    public function edit(Request $request, $id){
        /* https://res.cloudinary.com/doy8hfzvk/image/upload/v1677509717/image-not-available_zxhqhk.jpg */
        $artist = band::find($id);
        $request->validate([
            'name' => 'required|max:20',
            'country' => 'required|max:20',
            'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
            'date_creation' => 'required'
        ]);
        
        $file = $request->file('cover');
        
        if ($file != null) {
            $uploadResult = Cloudinary::UploadApi()->upload($file->getPathname());
            $imageUrl = $uploadResult['secure_url'];
            /* if ($imageUrl) {
                # code...
            } */
            $artist->cover_url = $imageUrl;
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_creation = $request->date_creation;
            $artist->save();
            return redirect('/dashboard')->with('success', 'Band updated');
        }else {
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_creation = $request->date_creation;
            $artist->save();
            return redirect('/dashboard')->with('success', 'Band updated ');
        }
    }

    public function delete($id){
        $artist = band::find($id);
        $artist->delete();
        return redirect('/dashboard')->with('success', 'Band deleted ');
    }
}
