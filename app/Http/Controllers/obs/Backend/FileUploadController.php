<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cloudinary;


class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function storeUploads(Request $request)
    {

        $file = $request->file('file');
      
        
        $uploadResult =  Cloudinary::UploadApi()->upload($file->getPathname());
        $imageUrl = $uploadResult['secure_url'];
        dd($imageUrl);
        

        return back()
            ->with('success', 'File uploaded successfully');
    }
}
