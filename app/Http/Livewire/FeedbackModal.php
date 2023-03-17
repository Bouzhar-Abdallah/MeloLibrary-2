<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class FeedbackModal extends ModalComponent
{
    
    public $message;
    public $listeners = [
        'formModalEvent' => 'showmessage',
    ];
    public function showmessage($message)
    {
        dd('test');
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
