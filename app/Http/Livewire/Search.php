<?php

namespace App\Http\Livewire;

use App\Models\artist;
use App\Models\band;
use App\Models\genre;
use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $name;
    public $search = '';
    public $options;
    public $count;

    public $listeners = ['itemUpdated' => 'render'];
    public function mount($name)
    {
        $this->name = $name;
        
    }
    public function render()
    {
        switch ($this->name) {
            case 'artist':
                $this->count = artist::count();
                return view('livewire.search', [
                    'users' => artist::where('name', 'like', '%'.$this->search.'%')->withCount('songs')->get()
                ]);
                break;
            case 'genre':
                $this->count = genre::count();
                return view('livewire.search', [
                    'users' => genre::where('name', 'like', '%'.$this->search.'%')->withCount('songs')->get()
                ]);
                break;
            case 'band':
                $this->count =band::count();
                return view('livewire.search', [
                    'users' => band::where('name', 'like', '%'.$this->search.'%')->withCount('songs')->get()
                ]);
                break;
            default:
                $this->options = null;
        }   
        
    }
}
