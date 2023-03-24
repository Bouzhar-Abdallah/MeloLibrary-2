<?php

namespace App\Http\Livewire\modals;

use App\Http\Livewire\Components\Feedbacks;
use App\Http\Livewire\Components\Search as Search;
use App\Models\artist;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Cloudinary;

class ArtistFormModal extends ModalComponent
{
    use WithFileUploads;
    public $flushMessage;
    public $formTitle;
    public $form;
    public $name;
    public $country;
    public $date_of_birth;
    public $cover_url;
    public $cover;
    public $artist;
    public $submitted = false;
    public $success = false;
    public $failure = false;

    protected $rules_with_cover = [
        'name' => 'required|max:20',
        'country' => 'required|max:20',
        'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
        'date_of_birth' => 'required'
    ];

    protected $rules_without_cover = [
        'name' => 'required|max:20',
        'country' => 'required|max:20',
        'date_of_birth' => 'required'
    ];

    public function mount($id = '')
    {
        /* if (!auth()->check() || auth()->user()->role->name !== 'admin') {
            // Prevent the component from rendering
            return abort(403, 'Unauthorized action.');
        } */
        if ($id == '') {
            $this->formTitle = 'create new artist';
            $this->form = 'create';
            $this->artist = new artist;
        } else {
            $this->formTitle = 'update artist';
            $this->form = 'update';
            $this->artist = artist::find($id);
            $this->name = $this->artist->name;
            $this->country = $this->artist->country;
            $this->date_of_birth = $this->artist->date_of_birth;
            $this->cover_url = $this->artist->cover_url;
        }
    }
    public function create()
    {
        
        $this->validate($this->rules_with_cover);

        $this->artist = new artist;
        $this->artist->name = $this->name;
        $this->artist->country = $this->country;
        $this->artist->date_of_birth = $this->date_of_birth;

        $result = $this->cover->storeOnCloudinary();
        $this->artist->cover_url = $result->getSecurePath();
        $this->artist->cover_id = $result->getPublicId();

        $this->success = $this->artist->save();
        /* not working */
        $this->closeModalWithEvents([
            $this->emit('flashMessage', 'Logged in successfully', 'success'),
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            Search::getName() => 'itemUpdated',
            //$this->emit('updateFeedback', ['success', 'artist created']),
        ]);

        //redirect('dashboard')->with('success', 'Artist created');
    }

    public function update()
    {
        
        $this->artist->name = $this->name;
        $this->artist->country = $this->country;
        $this->artist->date_of_birth = $this->date_of_birth;

        if ($this->cover) {
            $this->validate($this->rules_with_cover);
            $result = $this->cover->storeOnCloudinary();
            $publicId = $this->artist->cover_id;
            Cloudinary::destroy($publicId);
            $this->artist->cover_url = $result->getSecurePath();
            $this->artist->cover_id = $result->getPublicId();
        } else {
            $this->validate($this->rules_without_cover);
        }



        $this->success = $this->artist->save();
        
        $this->closeModalWithEvents([
            //FeedbackModal::getName() => ['itemUpdated', ['success']],
            Search::getName() => 'itemUpdated',
            //Feedbacks::getName() => ['message', ['success', 'artist updated']],
            $this->emit('flashMessage', 'Logged in successfully', 'success'),
            $this->emit('updateFeedback', ['success', 'artist updated']),

        ]);

        //redirect('dashboard')->with('success', 'Artist updated');
    }
    public static function modalMinWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        return view('livewire.modals.artist-form-modal');
    }
}
