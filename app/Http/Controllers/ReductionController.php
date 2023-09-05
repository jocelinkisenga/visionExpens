<?php

namespace App\Http\Controllers;

use App\Http\Repositorie\CommandeRepositorie;
use App\Models\Reduction;
use Illuminate\Http\Request;

class ReductionController extends Controller
{
    protected $repo_commande;

    public function __construct()
    {
        $this->repo_commande = new CommandeRepositorie;
    }

    public function index (){
        $reductions = Reduction::whereStatus(false)->get();
        return view('Pages.reduction', compact('reductions'));
    }

    public function show(int $id){
        //$reduction = $this->repo_commande->facture($id);
        return view('Pages.ReductionDetail',compact('id'));
    }
}
