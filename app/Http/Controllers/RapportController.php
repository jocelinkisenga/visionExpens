<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\StockRepositorie;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(){

        $data = [];
        $from = "";
        $to = "";

        return view("pages.rapports",compact('data','from','to'));
    }

    public function daily(){
        return view("Pages.rapport.dailyRapport");
    }
    
    public function weekly(){
       return view("Pages.rapport.weeklyRapport"); 
    }

    public function monthly(){
        return view("pages.rapport.monthlyRapport");
    }

    public function search(Request $request){
       
        $stock = new StockRepositorie;
        $data = $stock->stock($request->date_from, $request->date_to);

    
    return view("pages.rapports",compact('data'));

    }


}
