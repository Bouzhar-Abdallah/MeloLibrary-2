<?php

namespace App\Http\Livewire\admin;

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
    public function delete($id)
    {
        switch ($this->name) {
            case 'artist':
                artist::destroy($id);
                $this->emit('flashMessage', 'artist deleted successfully', 'success');
                break;
            case 'genre':
                genre::destroy($id);
                $this->emit('flashMessage', 'genre deleted successfully', 'success');

                break;
            case 'band':
                band::destroy($id);
                $this->emit('flashMessage', 'band deleted successfully', 'success');
                break;
            default:
                $this->options = null;
        }
        $this->emit('itemUpdated');
    }
    public function render()
    {
        switch ($this->name) {
            case 'artist':
                $this->count = artist::count();
                return view('livewire.admin.search', [
                    'users' => artist::where('name', 'like', '%' . $this->search . '%')->withCount('songs')->get()
                ]);
                break;
            case 'genre':
                $this->count = genre::count();
                return view('livewire.admin.search', [
                    'users' => genre::where('name', 'like', '%' . $this->search . '%')->withCount('songs')->get()
                ]);
                break;
            case 'band':
                $this->count = band::count();
                return view('livewire.admin.search', [
                    'users' => band::where('name', 'like', '%' . $this->search . '%')->withCount('songs')->get()
                ]);
                break;
            default:
                $this->options = null;
        }
    }
}
