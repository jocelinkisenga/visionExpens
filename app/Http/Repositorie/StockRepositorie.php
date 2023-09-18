<?php

namespace App\Http\Repositorie;

use App\Models\Commande;
use App\Models\HystoryProduct;
use Auth;
use Illuminate\Support\Facades\DB;

class StockRepositorie
{

    public function stock($from, $to)
    {
                DB::statement("SET SQL_MODE=''");
             $result =   DB::select("SELECT produits.name,DATE(hystory_products.created_at),
                                            hystory_products.prix_achat as achat, produits.price as vente,
                                            (SELECT SUM(new_quantity)
                                                FROM hystory_products
                                                WHERE hystory_products.product_id = produits.id
                                                AND DATE(hystory_products.created_at) >= '$from'AND DATE(hystory_products.created_at) <= '$to') as entries,
                                                (SELECT SUM(old_quantity)
                                                FROM hystory_products
                                                WHERE hystory_products.product_id = produits.id
                                                AND DATE(hystory_products.created_at) >= '$from'AND DATE(hystory_products.created_at) <= '$to') as solde,
                                             (SELECT SUM(orders.total_products)
                                                 FROM orders
                                                  WHERE commandes.produit_id = produits.id
                                                  AND DATE(commandes.created_at) >= '$from'AND DATE(commandes.created_at) <= '$to') as outputs
                                        FROM hystory_products, produits,commandes WHERE DATE(hystory_products.created_at) >= '$from' AND DATE(hystory_products.created_at) <= '$to' GROUP BY (produits.name)");



                $data = [
                    "results" => $result,
                    "from" => $from,
                    "to" => $to
                ];
                dd($data);
        //$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();
        return $data;
    }

    public function commandes()
    {
        //code, somme de la quantité, somme du prix, reduction, $prix total, date de la precommande
        DB::statement("SET SQL_MODE=''");
        return Db::select("SELECT precommandes.code, precommandes.created_at,
                        (SELECT SUM(quantity_commande) FROM commandes WHERE precommandes.id = commandes.precommande_id) as quantity_commande, (SELECT SUM(produits.price) FROM produits WHERE produits.id = commandes.produit_id) as price
    , commandes.reduction FROM commandes, produits, precommandes WHERE precommandes.id = commandes.id AND commandes.produit_id = produits.id GROUP BY precommandes.code ORDER bY precommandes.created_at DESC");
    }

    public function output($from, $to)
    {
        DB::statement("SET SQL_MODE=''");
        $result = Db::select("SELECT produits.name,produits.price, (SELECT SUM(order_details.product_quantity) FROM order_details WHERE order_details.product_id = produits.id) as order_quantity, order_details.created_at FROM order_details, produits
                            WHERE produits.user_id = " . Auth::user()->id . " AND order_details.user_id = " . Auth::user()->id . " AND order_details.product_id = produits.id
                            AND  DATE(order_details.created_at) >= '$from' AND DATE(order_details.created_at ) <='$to' GROUP BY order_details.product_id");

        $data = [
            "results" => $result,
            "from" => $from,
            "to" => $to
        ];
        //$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();


        return $data;
    }

    public function input($from, $to)
    {
        DB::statement("SET SQL_MODE=''");
        $result = Db::select("SELECT produits.name,produits.price,(SELECT SUM(hystory_products.prix_achat) FROM hystory_products WHERE hystory_products.product_id = produits.id) as prix_achat, (SELECT SUM(hystory_products.new_quantity) FROM hystory_products WHERE hystory_products.product_id = produits.id) as new_quantity, hystory_products.prix_achat FROM hystory_products, produits
                            WHERE produits.user_id = " . Auth::user()->id . " AND hystory_products.user_id = " . Auth::user()->id . " AND hystory_products.product_id = produits.id
                            AND  DATE(hystory_products.created_at) >= '$from' AND DATE(hystory_products.created_at ) <='$to' GROUP BY hystory_products.product_id");

        $data = [
            "results" => $result,
            "from" => $from,
            "to" => $to
        ];
        //$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();
        return $data;
    }

    public function rapport($from, $to)
    {
        DB::statement("SET SQL_MODE=''");
        $result = Db::select("SELECT produits.name,produits.price,
                            (SELECT SUM(hystory_products.prix_achat) FROM hystory_products WHERE hystory_products.product_id = produits.id) as prix_achat,
                            (SELECT SUM(order_details.product_quantity) FROM order_details WHERE order_details.product_id = produits.id) as order_quantity, order_details.created_at,
                            (SELECT SUM(hystory_products.new_quantity) FROM hystory_products WHERE hystory_products.product_id = produits.id) as new_quantity
                            FROM hystory_products, order_details, produits
                            WHERE produits.user_id = ". Auth::user()->id ." AND order_details.user_id = ". Auth::user()->id ." AND order_details.product_id = produits.id
                            AND  DATE(order_details.created_at) >= '$from' AND DATE(order_details.created_at ) <='$to' AND  DATE(hystory_products.created_at) >= '$from' AND DATE(hystory_products.created_at ) <='$to'
                            GROUP BY produits.id");

        $data = [
            "results" => $result,
            "from" => $from,
            "to" => $to
        ];
        //$result = HystoryProduct::with('produit')->groupBy("hystory_products.product_id")->get();

        return $data;
    }
}
