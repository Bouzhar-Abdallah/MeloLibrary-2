<?php

namespace App\View\Components\user;

use App\Models\song;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     */
    public $songs;
    public $playlists;
    public function __construct()
    {
        $this->songs = song::all();
        $this->playlists = Auth::user()->playlists;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.card');
    }
}
