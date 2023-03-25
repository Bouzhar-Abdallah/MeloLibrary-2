<?php

namespace App\Http\Livewire\modals;

use App\Http\Livewire\Components\Feedbacks as Feedbacks;
use App\Http\Livewire\Components\Search as Search;
use App\Http\Livewire\Components\Select as Select;
use App\Models\genre;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Cloudinary;

class GenreFormModal extends ModalComponent
{
    use WithFileUploads;
    public $flushMessage;
    public $formTitle;
    public $form;
    public $name;
    public $country;
    public $date_creation;
    public $cover_url;
    public $cover;
    public $genre;
    public $submitted = false;
    public $success = false;
    public $failure = false;

    protected $rules = [
        'name' => 'required|max:20',
    ];


    public function mount($id = '')
    {
        
        if ($id == '') {
            $this->formTitle = 'create new genre';
            $this->form = 'create';
            $this->genre = new genre;
        } else {
            $this->formTitle = 'update genre';
            $this->form = 'update';
            $this->genre = genre::find($id);
            $this->name = $this->genre->name;
            $this->country = $this->genre->country;
            $this->date_creation = $this->genre->date_creation;
            $this->cover_url = $this->genre->cover_url;
        }
    }
    public function create()
    {
        
        $this->validate();

        $this->genre = new genre;
        $this->genre->name = $this->name;
        

   
        $this->success = $this->genre->save();
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            //Search::getName() => 'itemUpdated',
            //$this->emit('updateFeedback', ['success', 'genre created']),
            $this->emit('flashMessage', 'genre created successfully', 'success'),
            $this->emit('itemUpdated'),
            //Select::getName() => 'itemUpdated',
        ]);

        //redirect('dashboard')->with('success', 'genre created');
    }

    public function update()
    {
        
        $this->validate();
        $this->genre->name = $this->name;


        $this->success = $this->genre->save();
        
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            /* Search::getName() => 'itemUpdated',
            Feedbacks::getName() => ['message', ['success', 'genre updated']],
            $this->emit('updateFeedback', ['success', 'genre updated']),
            Select::getName() => 'itemUpdated', */
            
            $this->emit('flashMessage', 'genre updated successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

        //redirect('dashboard')->with('success', 'genre updated');
    }
    public static function modalMinWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        return view('livewire.modals.genre-form-modal');
    }
}
