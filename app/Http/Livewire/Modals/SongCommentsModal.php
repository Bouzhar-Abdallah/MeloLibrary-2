<?php

namespace App\Http\Livewire\Modals;

use App\Models\song;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class SongCommentsModal extends ModalComponent
{
    public $song;
    public $comments = [];
    public $newComment;
    public function mount($id)
    {
        $this->song =song::find($id);
        $this->comments = $this->song->comments;
    }
    public function createComment()
    {
        var_dump($this->newComment);
        $comment = $this->song->comments()->create([
            'user_id' => Auth::user()->id,
            'text' => $this->newComment,
        ]);

        $this->emit('flashMessage', 'comment created successfully', 'success');
   
    }
    public function render()
    {
        return view('livewire.modals.song-comments-modal');
    }
}
