<?php

namespace App\View\Components;

use App\Models\artist;
use App\Models\band;
use App\Models\genre;
use App\Models\Language;
use App\Models\Writer;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
     /*    if ($name == 'artist') {
            
            $this->options = artist::all();
            
        }elseif ($name == 'genre') {
            $this->options = genre::all();
        }elseif ($name == 'band') {
            $this->options = band::all();
            
        } */
        switch ($name) {
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
        
    }

    public function render()
    {
        /*  {{ dd($options) }} */
        return view('components.select');
    }
}
