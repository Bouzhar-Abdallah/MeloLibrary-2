<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class SongCommentsModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.song-comments-modal');
    }
}
