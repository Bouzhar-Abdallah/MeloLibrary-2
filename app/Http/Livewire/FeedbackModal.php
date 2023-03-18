<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class FeedbackModal extends ModalComponent
{
    public $message= 'xxx';
    public $showFeedback = false;
    public $show = false;
    public $listeners = [
        'itemUpdated' => 'showmessage',
    ];
    /* public function mount(){
        $this->closeModal();
    } */
    public function showmessage($message)
    {
        
        if ($message === 'success') {
            // Show a success message
            $this->message = 'Artist has been updated successfully!';
        } else {
            // Show an error message
            $this->message = 'An error occurred while updating the artist.';
        }
    }
    public function render()
    {
        return view('livewire.feedback-modal');
    }
}
