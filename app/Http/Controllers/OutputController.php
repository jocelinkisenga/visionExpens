<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\StockRepositorie;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutputController extends Controller
{
    public $stock;
    public function __construct(){
        $this->stock = new StockRepositorie();
    }
    public function index(){

        $from = "";
        $to = "";
        $data = [];
        return view('Pages.rapport.outputs',compact('data','from','to'));
    }

    public function search(Request $request){
        $result = $this->stock->output($request->from, $request->to);
        $from = $request->from;
        $to = $request->to;
        $data = $result["results"];
        return view("Pages.rapport.outputs",compact('data','from','to'));
    }
}
