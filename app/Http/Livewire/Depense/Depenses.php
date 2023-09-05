<?php

namespace App\Http\Livewire\Depense;

use App\Models\Depense as ModelsDepense;
use Illuminate\Database\Events\ModelsPruned;
use Livewire\Component;

class Depenses extends Component
{
    public $depenses, $user_name, $motif, $montant;


    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->depenses = ModelsDepense::all();
        return view('livewire.depense.depenses');
    }


    /**
     * Summary of store
     * @return void
     */
    public function store(){
            $valide = $this->validate([
                "user_name"=>"required",
                "motif"=>"required",
                "montant"=>"required"
            ]);

            ModelsDepense::create($valide);
            $this->reset_fields();
            $this->dispatchBrowserEvent('close-modal');
    }


     /**
      * Summary of reset_fields
      * @return void
      */
    private function reset_fields(){
        $this->montant = "";
        $this->user_name = "";
        $this->motif = "";
    }
}
