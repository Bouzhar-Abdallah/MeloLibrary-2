<?php

namespace App\Http\Livewire\Modals;

use App\Models\language;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class LanguageFormModal extends ModalComponent
{

    public $flushMessage;
    public $formTitle;
    public $form;
    public $name;
    public $language;
    public $submitted = false;
    public $success = false;
    public $failure = false;

    protected $rules = [
        'name' => 'required|max:20',
    ];


    public function mount($id = '')
    {

        if ($id == '') {
            $this->formTitle = 'create new language';
            $this->form = 'create';
            $this->language = new language;
        } else {
            $this->formTitle = 'update language';
            $this->form = 'update';
            $this->language = language::find($id);
            $this->name = $this->language->name;
        }
    }
    public function create()
    {

        $this->validate();
        $this->language = new language;
        $this->language->name = $this->name;

        $this->success = $this->language->save();
        $this->closeModalWithEvents([
            $this->emit('flashMessage', 'language created successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

    }

    public function update()
    {

        $this->validate();
        $this->language->name = $this->name;


        $this->success = $this->language->save();

        $this->closeModalWithEvents([
 

            $this->emit('flashMessage', 'language updated successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

        
    }

    public function render()
    {
        return view('livewire.modals.language-form-modal');
    }
}
