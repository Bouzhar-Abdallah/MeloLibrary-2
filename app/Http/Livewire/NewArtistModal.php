<?php

namespace App\Http\Livewire;

use App\Models\artist;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use Cloudinary;

class NewArtistModal extends ModalComponent
{
    use WithFileUploads;
    public $flushMessage;

    public $name;
    public $country;
    public $date_of_birth;
    public $cover;

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

    public function create()
    {
        /* $this->submitted = true;
        $this->render(); */
        $this->validate($this->rules_with_cover);

        $artist = new artist;
        $artist->name = $this->name;
        $artist->country = $this->country;
        $artist->date_of_birth = $this->date_of_birth;

        $result = $this->cover->storeOnCloudinary();
        $artist->cover_url = $result->getSecurePath();
        $artist->cover_id = $result->getPublicId();

        $this->success = $artist->save();
        $this->closeModalWithEvents([
            FeedbackModal::getName() => ['itemUpdated', ['success']],
            Search::getName() => 'itemUpdated',
        ]);

        redirect('dashboard')->with('success', 'Artist created');
    }

    public function update()
    {
        if ($this->cover) {
            
        }else {
            
        }
        $this->validate($this->rules_without_cover);

        $artist = new artist;
        $artist->name = $this->name;
        $artist->country = $this->country;
        $artist->date_of_birth = $this->date_of_birth;

        $result = $this->cover->storeOnCloudinary();
        $artist->cover_url = $result->getSecurePath();
        $artist->cover_id = $result->getPublicId();

        $this->success = $artist->save();
        $this->closeModalWithEvents([
            FeedbackModal::getName() => ['itemUpdated', ['success']],
            Search::getName() => 'itemUpdated',
        ]);

        redirect('dashboard')->with('success', 'Artist created');
    }
    public static function modalMinWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        return view('livewire.new-artist-modal');
    }
}
