<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Order;
use App\Models\Precommande;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{

    /**
     * Summary of new
     * @param int $commandeId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function new (int $commandeId){
        $id = $commandeId;
        return view('pages.commandes',compact('id'));
    }


    /**
     * Summary of admin_commande
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function admin_commande(){

        $orders  = Order::latest()->where("user_id",Auth::user()->id)->get();

        return view('Pages.adminCommandes',compact('orders'));
    }

    // public function show(int $id){
    //     return view("Pages.CommandeDetail");'
    // }
}
