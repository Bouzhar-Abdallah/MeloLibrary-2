<?php

namespace App\View\Components\cards;

use App\Models\song;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class songscard extends Component
{
    /**
     * Create a new component instance.
     */
    public $total_songs;
    public $new_songs;
    public $pourcentage;
    public function __construct()
    {
        
        $this->total_songs = song::all()->count();
        $this->new_songs = song::where('created_at', '>=', now()->subDays(30))->count();
        $this->pourcentage = ($this->new_songs / $this->total_songs) * 100;
        $this->pourcentage = number_format((float)$this->pourcentage, 2, '.', '');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.songscard');
    }
}
