<?php

namespace App\View\Components\cards;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userscard extends Component
{
    /**
     * Create a new component instance.
     */
    public $total_users;
    public $new_users;
    public $pourcentage;

    public function __construct()
    {
        
        $role = Role::where('name', 'user')->first();
        $this->total_users = $role->users()->count();
        $this->new_users = $role->users()->where('created_at', '>=', now()->subDays(30))->count();
        $this->pourcentage = ($this->new_users / $this->total_users) * 100;
        $this->pourcentage = number_format((float)$this->pourcentage, 2, '.', '');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.userscard');
    }
}
