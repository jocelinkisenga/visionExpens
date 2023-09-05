<?php

namespace App\Http\Livewire\Commande;

use App\Http\Repositorie\CommandeRepositorie;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Commande as ModelsCommande;

class Commande extends Component
{
    public $commande_id, $products, $produit_id, $precommande_id, $quantity_commande, $commandes;



    /**
     * Summary of reset_fields
     * @return void
     */
    private function reset_fields()
    {
        $this->quantity_commande;
    }


    /**
     * Summary of ajouter
     * @param mixed $commandeId
     * @return void
     */
    public function ajouter( $commandeId)
    {
        $validate = $this->validate([
            'quantity_commande'=>'required'
        ]);

        $commande = new  CommandeRepositorie;
        $this->precommande_id = $commandeId;


        $produit = $commande->produit_by_id($this->produit_id);

        if ($produit) {

            $comm =  $commande->commande_by_id($this->precommande_id, $this->produit_id);

            if ($comm->isEmpty()) {

                $commande->store_command($this->precommande_id, $this->produit_id, $this->quantity_commande);
            } else {

                $commande->update_quantity($this->precommande_id, $this->produit_id, $this->quantity_commande);
            }
        }
    }


    /**
     * Summary of reduire
     * @param mixed $commandId
     * @param mixed $produitId
     * @return void
     */
    public function reduire($commandId, $produitId)
    {

        $commande = new  CommandeRepositorie;
       $result =  $commande->reduire_quantity($commandId, $produitId);


    }


         /**
          * Summary of annuler
          * @param mixed $commandId
          * @param mixed $produitId
          * @param mixed $quantity
          * @return void
          */

    public function annuler($commandId, $produitId,$quantity)
    {

        $commande = new  CommandeRepositorie;
       $result =  $commande->delete_commande($commandId, $produitId,$quantity);


    }


    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $commande = new  CommandeRepositorie;

        $this->products = Produit::all();
        $this->commandes = $commande->commande_by_product($this->commande_id);
        return view('livewire.commande.commande');
    }
}
