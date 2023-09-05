<?php

namespace App\Http\Repositorie;

use App\Models\Produit;
use App\Models\Precommande;
use App\Models\Commande;
use App\Models\Reduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReductionRepositorie
{
    public function reductions(){
        return Reduction::whereReduit(true)->whereStatus(false)->get();
    }
    public function modifier($id,$percent){
        $reduction = Reduction::wherePrecommande_id($id)->first();
       
        $reduction->update([
            'pourcentage'=>$percent,
            'reduit'=>true
        ]);
       
       // $this->reduction_commande($reduction->precommande_id, $percent);
    }

    public function store(int $commandeId){
        Reduction::create([
            'precommande_id' => $commandeId
    ]);
    }

    public function confirm(int $id){
    
        $reduction = Reduction::findOrFail($id);
        $reduced = $reduction->precommande_id;
        $reduction->update([
            'status'=>true
        ]);

        return $reduced;
    }

    private function reduction_commande($id,$reduction){
        $commande = Commande::wherePrecommande_id($id)->first();
        $commande->update([
            'reduction'=>$reduction
        ]);
    }
}