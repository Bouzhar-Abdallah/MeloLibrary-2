<?php

namespace App\Http\Livewire;

use App\Models\artist;
use LivewireUI\Modal\ModalComponent;

class EditArtistModal extends ModalComponent
{
    public $flushMessage;
    public $artist_id;
    public $name;
    public $artist;
    public function mount($artist_id)
    {
        $this->id = $artist_id;
        $this->artist = artist::find($artist_id);
        $this->name = $this->artist->name;
    }

    public function closeAndUpdateHelloWorld()
    {
        $this->closeModalWithEvents([
	        /* 'childModalEvent', // Emit global event
            HelloWorld::getName() => 'childModalEvent', // Emit event to specific Livewire component */
            HelloWorld::getName() => ['childModalEvent', [10]], // Emit event to specific Livewire component with a parameter            
        ]);
    }
    public function edit(){
        /* https://res.cloudinary.com/doy8hfzvk/image/upload/v1677509717/image-not-available_zxhqhk.jpg */
        $artist = artist::find($this->artist_id);
        $artist->name = $this->name;

        $artist->save();
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
        
        
        $this->closeModalWithEvents([
            /* FeedbackModal::getName() => ['formModalEvent', ['success']], */
            FeedbackModal::getName() => 'itemUpdated',
            Search::getName()=> 'itemUpdated',
        ]);
        //$this->closeModalWithEvents();

        // Emit an event to open the feedback modal
        $this->emitTo(FeedbackModal::class, 'openModal', 'success');
    }
    public function render()
    {
        return view('livewire.edit-artist-modal');
    }
}
