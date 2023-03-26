<?php

namespace App\Http\Livewire\Modals;

use App\Models\comment;
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
        $comment = new comment();
        $comment->user_id = Auth::user()->id;
        $comment->song_id = $this->song->id;
        $comment->text = $this->newComment;
        
        if ($comment->save()) {
            $this->emit('flashMessage', 'comment created successfully', 'success');
        }else {
            $this->emit('flashMessage', 'something went wrong', 'failure');
        }
        $this->closeModal();
    }
    public function report(){
        $this->emit('flashMessage', 'comment reported successfully', 'success');
        $this->closeModal();
        
    }
    public function render()
    {
        return view('livewire.modals.song-comments-modal');
    }
}
