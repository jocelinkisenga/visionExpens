<?php

namespace App\Http\Livewire\Role;

use App\Models\Role as ModelsRole;
use Livewire\Component;

class Role extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.role.role');
    }

}
