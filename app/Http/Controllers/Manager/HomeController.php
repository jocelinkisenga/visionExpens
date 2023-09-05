<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view("Pages.manager.index");
    }
}
