<?php

namespace App\Http\Livewire\Modals;

use App\Models\Writer;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class WriterFormModal extends ModalComponent
{
    
    public $flushMessage;
    public $formTitle;
    public $form;
    public $name;
    public $country;
    public $date_creation;
    public $cover_url;
    public $cover;
    public $writer;
    public $submitted = false;
    public $success = false;
    public $failure = false;

    protected $rules = [
        'name' => 'required|max:20',
    ];


    public function mount($id = '')
    {
        
        if ($id == '') {
            $this->formTitle = 'create new writer';
            $this->form = 'create';
            $this->writer = new writer;
        } else {
            $this->formTitle = 'update writer';
            $this->form = 'update';
            $this->writer = writer::find($id);
            $this->name = $this->writer->name;
            $this->country = $this->writer->country;
            $this->date_creation = $this->writer->date_creation;
            $this->cover_url = $this->writer->cover_url;
        }
    }
    public function create()
    {
        
        $this->validate();

        $this->writer = new writer;
        $this->writer->name = $this->name;
        

   
        $this->success = $this->writer->save();
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            //Search::getName() => 'itemUpdated',
            //$this->emit('updateFeedback', ['success', 'writer created']),
            $this->emit('flashMessage', 'writer created successfully', 'success'),
            $this->emit('itemUpdated'),
            //Select::getName() => 'itemUpdated',
        ]);

        //redirect('dashboard')->with('success', 'writer created');
    }

    public function update()
    {
        
        $this->validate();
        $this->writer->name = $this->name;


        $this->success = $this->writer->save();
        
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            /* Search::getName() => 'itemUpdated',
            Feedbacks::getName() => ['message', ['success', 'writer updated']],
            $this->emit('updateFeedback', ['success', 'writer updated']),
            Select::getName() => 'itemUpdated', */
            
            $this->emit('flashMessage', 'writer updated successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

        //redirect('dashboard')->with('success', 'writer updated');
    }
    public static function modalMinWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        return view('livewire.modals.writer-form-modal');
    }
}
