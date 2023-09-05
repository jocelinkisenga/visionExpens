<?php

namespace App\Http\Livewire\Table;

use App\Models\Table;
use Livewire\Component;

class Tables extends Component
{
    public $data, $name, $places;

    public function render()
    {
        $this->data = Table::all();
        return view('livewire.table.tables');
    }

    public function store(){
            $valide = $this->validate([
                'name'=>'required',
                'places'=>'required'
            ]);
        Table::create($valide);
        session()->flash('message','table ajoutée avec succès');
        $this->reset_fields();
    }

    public function reset_fields(){
        $this->places = "";
        $this->name = "";
    }

}
