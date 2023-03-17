<?php

namespace App\Http\Livewire;

use App\Models\artist;
use App\Models\band;
use App\Models\genre;
use Livewire\Component;

class EditModal extends Component
{

    public $item;

    public $show = false;
    public $id_item;
    public $model_name;
    protected $listeners = [
        'show' => 'show'
    ];
    public function show($ipayload)
    {
        $this->show = !$this->show;
        if (!$this->show) {
            $this->reset();
        }
        $this->id_item = $ipayload['id'];
        $this->model_name = $ipayload['name'];
        switch ($this->model_name) {
            case 'artist':
                $this->item = artist::find($this->id_item);
                break;
            case 'genre':
                $this->item = genre::find($this->id_item);
                break;
            case 'band':
                $this->item = band::find($this->id_item);
                break;
            default:
                $this->item = null;
        }
    }
    public $name;
    public $email;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];
 
    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        artist::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }
    public function render()
    {
        return view('livewire.edit-modal');
    }
}
