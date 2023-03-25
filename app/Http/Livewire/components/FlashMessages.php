<?php

namespace App\Http\Livewire\components;

use Livewire\Component;

class FlashMessages extends Component
{
    public $messages = [];

    protected $listeners = [
        'flashMessage' => 'addMessage',
    ];

    public function mount()
    {
        if (session('flashMessage')) {
            $this->addMessage(session('flashMessage')['message'], session('flashMessage')['type']);
        }
    }

    public function addMessage($message, $type = 'info')
    {
        $this->messages[] = [
            'message' => $message,
            'type' => $type,
        ];

        $this->dispatchBrowserEvent('newFlashMessage');
    }

    public function removeMessage($index)
    {
        unset($this->messages[$index]);
    }

    public function render()
    {
        return view('livewire.components.flash-messages');
    }
}
