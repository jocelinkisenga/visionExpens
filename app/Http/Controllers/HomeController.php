<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Reduction;
use App\Utilities\FormatDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $produits = Produit::where("user_id",Auth::user()->id)->get();
     
        $notifications = Reduction::whereStatus(false)->get();
        return view('Pages.index',compact("produits","notifications"));
    }

    public function facture($commandId){
       $results =  DB::select("SELECT commandes.quantity_commande as qty,
                                produits.name, produits.price, precommandes.created_at, 
                                tables.name as tname, precommandes.id as pId 
                                FROM precommandes,commandes,produits,tables  
                                WHERE commandes.precomande_id = precommandes.id 
                                AND precommandes.id = '$commandId' 
                                AND commandes.produit_id = produits.id 
                                AND tables.id = precommandes.table_id");
        
        return view('Pages.facture',compact('results'));
    }
}
