<?php

namespace App\Http\Livewire\User;

use App\Models\song;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActiveRating extends Component
{
    public $rating;
    public $song_id;
    public $clickedRating ;
    public $alreadyRated;
    public function mount($rating, $songid){
        $this->rating = $rating;
        $this->song_id = $songid;
        $this->alreadyRated = Auth::user()->ratings()->wherePivot('song_id', $songid)->first();
    }
    public function rate($rate){
        $song = song::find($this->song_id);
        Auth::user()->ratings()->attach($this->song_id, ['rating' => $rate]);
    }
    public function render()
    {
        return view('livewire.user.active-rating');
    }
}
