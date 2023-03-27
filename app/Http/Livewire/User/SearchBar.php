<?php

namespace App\Http\Livewire\User;

use App\Models\song;
use Livewire\Component;

class SearchBar extends Component
{
    public $searchString = '';
    public $songs;
    public function updatedSearchString(){
        $this->songs = song::where('title', 'like', '%' . $this->searchString . '%')
        ->orWhereHas('genres', function($query) {
            $query->where('name', 'like', '%' . $this->searchString . '%');
        })
        ->orWhereHas('artists', function($query) {
            $query->where('name', 'like', '%' . $this->searchString . '%');
        })
        ->orWhere('lyrics', 'like', '%' . $this->searchString . '%')
        ->get();
    }
    public function render()
    {
        return view('livewire.user.search-bar');
    }
}
