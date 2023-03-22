<?php

namespace App\View\Components;

use App\Models\artist;
use App\Models\band;
use App\Models\genre;
use App\Models\Language;
use App\Models\Writer;
use Illuminate\View\Component;

class Media extends Component
{
    public $playing_playlist;
   
    public function __construct($playing_playlist)
    {
        dd('zz');
       $this->playing_playlist = $playing_playlist;
    }

    public function render()
    {
        /*  {{ dd($options) }} */
        return view('components.media');
    }
}
