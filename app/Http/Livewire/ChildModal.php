<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ChildModal extends ModalComponent
{
    public $name;
    
    public function mount($name)
    {
        $this->name = $name;
    }

    public function closeAndUpdateHelloWorld()
    {
        $this->closeModalWithEvents([
	        /* 'childModalEvent', // Emit global event
            HelloWorld::getName() => 'childModalEvent', // Emit event to specific Livewire component */
            HelloWorld::getName() => ['childModalEvent', [10]], // Emit event to specific Livewire component with a parameter            
        ]);
    }

    public function render()
    {
        return view('livewire.child-modal');
    }
}