<?php

namespace App\Http\Controllers;

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
}
