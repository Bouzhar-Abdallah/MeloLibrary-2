<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Ratings extends Component
{
    public $rating;
    public function mout($rating){
        $this->rating = $rating;
    }
    public function render()
    {
        return view('livewire.ratings');
    }
}
