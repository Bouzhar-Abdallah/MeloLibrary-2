<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function Index()
    {
        $title = 'home';
        return view('user.index',compact('title'));
    }
}
