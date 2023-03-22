<?php

namespace App\Http\Livewire\Music;

use Livewire\Component;

class MediaPlayer extends Component
{
    public $playing_playlist;


    public function mount($playing_playlist = '')
    {
        $this->playing_playlist = $playing_playlist;
        
    }

    public function render()
    {
        return view('livewire.music.media-player');
    }
}
