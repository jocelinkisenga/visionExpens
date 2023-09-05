<?php

namespace App\Http\Controllers;

use App\Models\HystoryProduct;
use App\Models\Produit;
use App\Http\Repositorie\StockRepositorie;
use Auth;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public $stock;

    /**
     * Summary of __construct
     */
    public function __construct(){
        $this->stock = new StockRepositorie();
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){

        $to = "";
        $from ="";

        $data = [];

        return view('pages.rapport.entries',compact("data","to","from"));
    }

    /**
     * Summary of search
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request){
        $result = $this->stock->output($request->from, $request->to);
        $from = $request->from;
        $to = $request->to;
        $data = $result["results"];
        
        return view("Pages.rapport.entries",compact('data','from','to'));
    }
}
