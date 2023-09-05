<?php
namespace App\Http\Repositorie;
use Illuminate\Support\Facades\DB;
class ProduitRepository {

    // public function hystory_commandes(int $id){
    //     DB::statement("SET SQL_MODE=''");
    //     return DB::select("SELECT commandes.quantity_commande,  users.name as serveur, commandes.precomande_id, produits.name as prodName
    //                                 FROM commandes, precommandes, produits, users 
    //                                 WHERE DATE(commandes.created_at) = CURRENT_DATE
    //                                 AND commandes.precommande_id = precommandes.id
    //                                 AND precommandes.user_id = users.id
    //                                 AND commandes.produit_id = $id
    //                                 AND produits.id = $id
    //                             ");
               
    // }

    public function hystory_entrie(int $id){
        DB::statement("SET SQL_MODE=''");
        $result = DB::select("SELECT hystory_products.new_quantity as qte,hystory_products.prix_achat as achat
                                    FROM hystory_products, produits
                                    WHERE DATE(hystory_products.created_at) = CURRENT_DATE
                                    AND hystory_products.product_id = $id
                                    AND produits.id = $id
                                ");
                return $result;
    }
}