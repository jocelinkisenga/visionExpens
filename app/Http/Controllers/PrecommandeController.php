<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class PrecommandeController extends Controller
{
 public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        return view("pages.home",compact('categories','produits'));
    }
}
