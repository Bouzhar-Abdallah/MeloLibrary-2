<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parentController extends Controller
{
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
}
