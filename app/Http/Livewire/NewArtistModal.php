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

    protected $rules = [
        'name' => 'required|max:20',
        'country' => 'required|max:20',
        'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
        'date_of_birth' => 'required'
    ];
    /*  public function mount()
    {
        $this->artist = new stdClass;
        $this->artist->country = '';
        $this->artist->date_of_birth = '';
        $this->artist->cover_url = '';
     
    } */

    public function closeAndUpdateHelloWorld()
    {
        $this->closeModalWithEvents([
            /* 'childModalEvent', // Emit global event
            HelloWorld::getName() => 'childModalEvent', // Emit event to specific Livewire component */
            HelloWorld::getName() => ['childModalEvent', [10]], // Emit event to specific Livewire component with a parameter            
        ]);
    }
    public function save()
    {
        /* $this->submitted = true;
        $this->render(); */
        $this->validate();

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

        /*  $request->validate([
            'name' => 'required|max:20',
            'country' => 'required|max:20',
            'cover' => 'mimes:png,jpg,jpeg,webp|max:3048',
            'date_of_birth' => 'required'
        ]); */

        /* 
        $file = $request->file('cover');
        
        if ($file != null) {
            $uploadResult = Cloudinary::UploadApi()->upload($file->getPathname());
            $imageUrl = $uploadResult['secure_url'];
            $artist->cover_url = $imageUrl;
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_of_birth = $request->date_of_birth;
            $artist->save();
            return redirect('/dashboard')->with('success', 'artist updated');
        }else {
            $artist->name = $request->name;
            $artist->country = $request->country;
            $artist->date_of_birth = $request->date_of_birth;
            $artist->save();
            return redirect('/dashboard')->with('success', 'artist updated ');
        }
        */


        //$this->closeModalWithEvents();

        // Emit an event to open the feedback modal
        //$this->emitTo(FeedbackModal::class, 'openModal', 'success');
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
