<?php

namespace App\Http\Livewire\Precommande;

use App\Models\Precommande as ModelsPrecommande;
use App\Models\Table;
use App\Models\User;
use Livewire\Component;

class Precommande extends Component
{
    public $tables, $table_id, $precommande, $serveurs, $user_id;

    /**
     * Summary of reset_fields
     * @return void
     */
    public function reset_fields(){
        $this->table_id = "";
    }

    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->tables = Table::all();
        $this->serveurs = User::whereRole_id(4)->get();
        $this->precommande = ModelsPrecommande::join('tables','precommandes.table_id','=','tables.id')
        ->join('users','precommandes.user_id','=','users.id')
        ->where('precommandes.status',false)->get(['precommandes.*','tables.name','users.name as user']);
     
        return view('livewire.precommande.precommande');
    }


    /**
     * Summary of store
     * @return void
     */
    public function store(){

        $valide = $this->validate([
            'table_id'=>["required"],
            'user_id'=>'required'
        ]);
        ModelsPrecommande::create($valide);
        $this->reset_fields();
        session()->flash('message','commande crée avec succès');

    }


    /**
     * Summary of confirmer
     * @param int $id
     * @return void
     */
    public function confirmer(int $id){
        $precommande = ModelsPrecommande::find($id);
        $precommande->update([
            'status'=>true
        ]);

        session()->flash('message','commande confirmer avec succès');
    }
}
