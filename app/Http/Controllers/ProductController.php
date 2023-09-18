<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('Pages.produit');
    }

    public function show(int $id){
        return view('pages.productDetail',compact('id'));
    }


    Public function delete(int $id){
        Produit::destroy($id);
        return redirect()->back();
    }
}
