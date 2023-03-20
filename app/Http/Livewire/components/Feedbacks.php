<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Feedbacks extends Component
{
    public $message= 'initial';
    public $state;
    public $listeners = [
        'updateFeedback' => 'updateFeedback',
    ];
    
    public function updateFeedback($data){
        $this->state = $data[0];
        $this->message = $data[1];
        $this->render();
    }
    public function render()
    {
        return view('livewire.components.feedbacks');
    }
}
