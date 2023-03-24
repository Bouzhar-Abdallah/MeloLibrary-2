<?php

namespace App\Http\Livewire\Components;
use App\Models\artist;
use App\Models\band;
use App\Models\genre;
use App\Models\Language;
use App\Models\Writer;
use Livewire\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $listeners = ['itemUpdated' => 'render'];
    public function mount($name, $label){
        $this->name = $name;
        $this->label = $label;
    }
    public function render()
    {
        switch ($this->name) {
            case 'artist':
                $this->options = artist::all();
                break;
            case 'genre':
                $this->options = genre::all();
                break;
            case 'band':
                $this->options = band::all();
                break;
            case 'language':
                $this->options = Language::all();
                break;
            case 'writer':
                $this->options = Writer::all();
                break;
            default:
                $this->options = null;
        }
        return view('livewire.components.select');
        
    }
}
