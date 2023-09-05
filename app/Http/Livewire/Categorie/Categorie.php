<?php

namespace App\Http\Livewire\Categorie;

use App\Models\Categorie as ModelsCategorie;
use Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Categorie extends Component
{
    public $name;
    public $data;
    public function render()
    {
        $this->data = ModelsCategorie::where('user_id', Auth::user()->id)->get();
        return view('livewire.categorie.categorie');
    }

    public function reset_fields()
    {
        $this->name = "";
    }

    public function store()
    {
        $validate = $this->validate(['name' => 'required']);

        ModelsCategorie::create([
            "user_id" => Auth::user()->id,
            "name" => $validate['name']
        ]);
        session()->flash('message', 'categorie created successfully');
        $this->reset_fields();
        $this->emit('categorieStore');
        $this->dispatchBrowserEvent("close-modal");
    }

    public function modifier($id)
    {
        $categorie = ModelsCategorie::find($id);
        $categorie->update([
            "name" => $this->name
        ]);

        session()->flash('message', 'categorie modifier avec succès');

    }
}
