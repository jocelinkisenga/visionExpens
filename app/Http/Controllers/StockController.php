<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\StockRepositorie;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public $stockRepo;
    public function __construct()
    {
        $this->stockRepo = new StockRepositorie;
    }
    public function daily()
    {
        $result = $this->stockRepo->daily_stock();
        dd($result);
        return view("Pages.stock.dailyStock", compact('result'));
    }

    public function monthly()
    {
        return view("Pages.stock.weeklyStock");
    }


    public function weekly()
    {
        return view("Pages.stock.monthly");
    }
}
