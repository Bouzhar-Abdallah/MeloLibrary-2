<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Aside extends Component
{
    public $playlists;
    public $user;


    public function mount(){
        $this->user = Auth::user();
        //$this->playlists = $this->user->playlists();
        $this->playlists = $this->user->playlists()->with('songs')->get();
        
    }
    public function render()
    {
        return view('livewire.user.aside');
    }
}
