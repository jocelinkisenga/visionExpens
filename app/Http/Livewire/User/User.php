<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class User extends Component
{
    public $role_name, $roles, $name, $sexe, $role_id, $phone, $password, $email, $users;
    public function render()
    {
        // $this->roles = Role::all();
        $this->users = ModelsUser::get();


        return view('livewire.user.user');
    }


    public function store_role()
    {


        $valide = $this->validate([
            'role_name' => ['required', 'unique:roles,name']
        ]);

        Role::create([
            'name' => $this->role_name
        ]);
        $this->reset_fieds();
    }

    public function ajouter()
    {
        // if (!empty($this->password)) {
            $password = Hash::make($this->password);

            ModelsUser::create([
                "name" => $this->name,
                "phone" => $this->phone,
                "sexe" => $this->sexe,
                "role_id" => $this->role_id,
                "password" => $password,
                "email" => $this->email
            ]);
            $this->reset_fieds();
            $this->dispatchBrowserEvent("close-modal");
        // } else {
        //     ModelsUser::create([
        //         "name" => $this->name,
        //         "phone" => $this->phone,
        //         "sexe" => $this->sexe,
        //         "role_id" => $this->role_id,
        //     ]);
        //     $this->reset_fieds();
        //     $this->dispatchBrowserEvent('close-modal');
        // }
    }

    private function reset_fieds()
    {
        $this->role_name = "";
        $this->name = "";
        $this->phone = "";
        $this->sexe = "";
        $this->role_id = "";
        $this->password = "";
        $this->email = "";
    }
}
