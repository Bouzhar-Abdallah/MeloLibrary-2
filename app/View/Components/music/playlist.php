<?php

namespace App\View\Components\music;

use App\Models\playlist as ModelsPlaylist;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class playlist extends Component
{
    /**
     * Create a new component instance.
     */
    public $playlist;
    public $username;
    public function __construct()
    {
        $this->username = Auth::user()->id;
        $this->playlist = ModelsPlaylist::get();
        dd($this->playlist);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.music.playlist');
    }
}
