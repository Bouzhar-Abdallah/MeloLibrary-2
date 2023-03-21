<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class LoginFormModal extends ModalComponent
{
    public $email;
    public $password;
    public function login(){
        dd($this->email);
    }
    public function render()
    {
        return view('livewire.modals.login-form-modal');
    }
}
