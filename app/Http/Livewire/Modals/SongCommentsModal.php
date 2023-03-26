<?php

namespace App\Http\Livewire\Modals;

use App\Models\song;
use LivewireUI\Modal\ModalComponent;

class SongCommentsModal extends ModalComponent
{
    public $song;
    public $comments = [];
    public function mount($id)
    {
        $this->song =song::find($id);
        $this->comments = $this->song->comments;
    }
    public function render()
    {
        return view('livewire.modals.song-comments-modal');
    }
}
