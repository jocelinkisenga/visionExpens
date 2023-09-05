<?php

namespace App\Http\Livewire;

use App\Enums\RoleEnum;
use App\Http\Repositorie\CommandeRepositorie;
use App\Http\Repositorie\ReductionRepositorie;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\Produit;
use App\Models\Serveur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use SebastianBergmann\Type\NullType;

class Home extends Component

{
    public  $categories;
    public  $produits;
    public  $servers; 
    public  $server_id;
    public  $last_commande = null;
    public  $quantity_commande = 1;
    public  $produit_id;
    public  $commandes;
    public  $precommandes;
    public  $facture;
    public  $invoce, $reductions;
    public  $todays;
    protected $commande_repo, $reduction_repo;

    protected $listeners = ["reduced" => 'render', 'reduction-confirmed'=>'render'];


    public function __construct()
    {
        $this->commande_repo = new CommandeRepositorie;
        $this->reduction_repo = new ReductionRepositorie;
    }

    public function render()
    {


        if ($this->last_commande) {
            $this->invoce = $this->commande_repo->facture($this->last_commande->id);
            $this->commandes  = $this->commande_repo->all_commandes($this->last_commande->id);
        }

        $this->categories = Categorie::with('produits')->get();
        $this->produits = Produit::all();
        $this->precommandes = $this->commande_repo->all_precommandes();
        $this->reductions = $this->reduction_repo->reductions();
        $this->todays = $this->commande_repo->todays();
      
     

        $this->serveurs = User::whereRole_id(RoleEnum::SERVER)->get();

        return view('livewire.home');
    }

    public function store()
    {

        $code = '#' . date('Y-m-d') . rand(1, 1000);

       $precommande =  Precommande::create([
            'server_id' => $this->server_id,
            'user_id' => Auth::user()->id,
            'code' => $code
        ]);
         $this->facture = $this->commande_repo->facture($precommande->id);
        session()->flash('message','commande créer  avec succès');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function reduction($commandeId)
    {
        $this->reduction_repo->store($commandeId);
    }



    public function ajouter($produitId)
    {


        $this->produit_id = $produitId;

        $produit = $this->commande_repo->produit_by_id($this->produit_id);

        if ($produit and $this->last_commande != null) {

            $comm = $this->commande_repo->commande_by_id($this->last_commande->id, $this->produit_id);

            if (empty($comm)) {

                $this->commande_repo->store_command($this->last_commande->id, $this->produit_id, $this->quantity_commande);
            } else {

                $this->commande_repo->update_quantity($this->last_commande->id, $this->produit_id, $this->quantity_commande);
            }
        }
    }

    public function reduire($commandId, $produitId)
    {


        $result = $this->commande_repo->reduire_quantity($commandId, $produitId);
    }


    public function annuler($commandId, $produitId, $quantity)
    {


        $result = $this->commande_repo->delete_commande($commandId, $produitId, $quantity);
    }

    public function reduction_facture($commandeId)
    {
       return $this->facture = $this->commande_repo->facture($commandeId);
        $this->emit('reduced');
    }

    public function edit($id)
    {

        $this->facture = $this->commande_repo->facture($id);

        return $this->last_commande =  $this->commande_repo->last_commande($id);
        
       // $this->emit('categorieStore');
       $this->dispatchBrowserEvent('close-modal');
         
    }

    public function invoice($id){
       
       
        $precommande = Precommande::find($id);
    
        $precommande->update([
            "invoiced" => 1
        ]);
    }

    public function confirmer(int $id)
    {
         $this->facture = $this->commande_repo->facture($id);

        $this->commande_repo->confirm($id);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirm_reduction(int $id){
    
        
  $precommande_id =  $this->reduction_repo->confirm($id);
       
   return $this->facture = $this->commande_repo->facture($precommande_id); 
        
    $this->emit("reduction-confirmed");
        
        
    }



}
