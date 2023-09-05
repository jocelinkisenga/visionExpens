<?php

namespace App\Http\Repositorie;

use App\Models\Precommande;
use Illuminate\Support\Facades\DB;

class UserRepository{

    public function serveur_commandes(int  $id){
        DB::statement("SET SQL_MODE=''");
    //   return  $precommandes = Precommande::whereUser_id($id)->join('commandes','precommandes.id','=','commandes.precommande_id')->join('produits','produits.id','=','commandes.produit_id')->groupBy('produits.name')->get();
   return DB::select("SELECT produits.*, commandes.quantity_commande
                                    FROM produits, commandes, precommandes
                                    WHERE DATE(precommandes.created_at) = CURRENT_DATE
                                    AND precommandes.server_id = $id
                                    AND precommandes.id = commandes.precommande_id
                                    AND commandes.produit_id = produits.id
                                ");
        
    }


}