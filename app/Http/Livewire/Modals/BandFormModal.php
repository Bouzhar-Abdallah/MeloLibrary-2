<?php

namespace App\Http\Livewire\modals;

use App\Http\Livewire\Components\Feedbacks as Feedbacks;
use App\Http\Livewire\Components\Search as Search;
use App\Models\band;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Cloudinary;

class BandFormModal extends ModalComponent
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
    public $band;
    public $submitted = false;
    public $success = false;
    public $failure = false;

    protected $rules_with_cover = [
        'name' => 'required|max:20',
        'country' => 'required|max:20',
        'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
        'date_creation' => 'required'
    ];

    protected $rules_without_cover = [
        'name' => 'required|max:20',
        'country' => 'required|max:20',
        'date_creation' => 'required'
    ];

    public function mount($id = '')
    {
        
        if ($id == '') {
            $this->formTitle = 'create new band';
            $this->form = 'create';
            $this->band = new band;
        } else {
            $this->formTitle = 'update band';
            $this->form = 'update';
            $this->band = band::find($id);
            $this->name = $this->band->name;
            $this->country = $this->band->country;
            $this->date_creation = $this->band->date_creation;
            $this->cover_url = $this->band->cover_url;
        }
    }
    public function create()
    {
        
        $this->validate($this->rules_with_cover);

        $this->band = new band;
        $this->band->name = $this->name;
        $this->band->country = $this->country;
        $this->band->date_creation = $this->date_creation;

        $result = $this->cover->storeOnCloudinary();
        $this->band->cover_url = $result->getSecurePath();
        $this->band->cover_id = $result->getPublicId();

        $this->success = $this->band->save();
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            //Search::getName() => 'itemUpdated',
            //$this->emit('updateFeedback', ['success', 'band created']),
            $this->emit('flashMessage', 'band created successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

        //redirect('dashboard')->with('success', 'band created');
    }

    public function update()
    {
        
        $this->band->name = $this->name;
        $this->band->country = $this->country;
        $this->band->date_creation = $this->date_creation;

        if ($this->cover) {
            $this->validate($this->rules_with_cover);
            $result = $this->cover->storeOnCloudinary();
            $publicId = $this->band->cover_id;
            Cloudinary::destroy($publicId);
            $this->band->cover_url = $result->getSecurePath();
            $this->band->cover_id = $result->getPublicId();
        } else {
            $this->validate($this->rules_without_cover);
        }



        $this->success = $this->band->save();
        
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            //Search::getName() => 'itemUpdated',
            //Feedbacks::getName() => ['message', ['success', 'band updated']],
            //$this->emit('updateFeedback', ['success', 'band updated']),
            $this->emit('flashMessage', 'band updated successfully', 'success'),
            $this->emit('itemUpdated'),
        ]);

        //redirect('dashboard')->with('success', 'band updated');
    }
    public static function modalMinWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        return view('livewire.modals.band-form-modal');
    }
}
