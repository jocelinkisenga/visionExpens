<?php

namespace App\Http\Livewire\ProducDetail;

use App\Http\Repositorie\ProduitRepository;
use App\Models\Produit;
use Auth;
use Livewire\Component;
use App\Models\HystoryProduct;

class Productdetail extends Component
{
    public $data, $product_id, $prix_achat, $produit_quantity, $prix, $commandes, $entries ;


    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function render()
    {
     $repo = new ProduitRepository;
      $this->data =  Produit::findOrFail($this->product_id);
      $this->entries = $repo->hystory_entrie($this->product_id);
      //$this->commandes = $repo->hystory_commandes($this->product_id);

        return view('livewire.produc-detail.productdetail');
    }


    /**
     * Summary of ajouter
     * @param int $produitI
     * @return void
     */
    public function ajouter(int $produitI)
    {

        $produit = Produit::find($produitI);

        $old_quantity = $produit->quantity;

        $history =  HystoryProduct::create([
            'user_id' => Auth::user()->id,
            'product_id' => $produitI,
            'new_quantity' => $this->produit_quantity,
            'old_quantity' => $old_quantity,
            'prix_achat' => $this->prix_achat
        ]);
        if ($history) {
            $updated_quantity = $old_quantity + $this->produit_quantity;
            $produit->update([
                'quantity' => $updated_quantity
            ]);
            $this->reset_fields();
            session()->flash('message', 'quantite ajouté avec succès');
            $this->dispatchBrowserEvent('close-modal');
        }
    }


    /**
     * Summary of reset_fields
     * @return void
     */
    public function reset_fields()
    {
        $this->name = "";
        $this->categorie_id = "";
        $this->price = "";
        $this->produit_quantity = "";
        $this->product_price = "";
        $this->prix_achat = "";
        $this->produit_id = "";
        $this->prix_vente = "";
        $this->prix = "";
    }


    /**
     * Summary of modifier_prix
     * @param int $id
     * @return void
     */
    public function modifier_prix(int $id){
       $produit =  Produit::find($id);
       $produit->update([
        "price"=>$this->prix
       ]);
       $this->reset_fields();
     session()->flash('message','prix modifier avec succès');
     $this->reset_fields();
     $this->dispatchBrowserEvent('close-modal');

    }


}
