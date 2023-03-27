<?php

namespace App\Http\Livewire\Admin;

use App\Models\comment;
use Livewire\Component;

class CommentsTable extends Component
{
    public $inputfield = '';
    public $comments;
    public function mount(){
        $this->comments = comment::all();
    }
    public function deleteComment($id){
        $song = comment::find($id);
        $song->delete();
        $this->comments = comment::all();
        
        $this->emit('flashMessage', 'comment deleted', 'success');
    }
    public function render()
    {
        return view('livewire.admin.comments-table');
    }
}
