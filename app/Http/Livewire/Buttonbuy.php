<?php

namespace App\Http\Livewire;

use App\Http\Repositorie\CardRepository;
use App\Models\Produit;
use Livewire\Component;

class Buttonbuy extends Component
{
    public int $product_id;
    protected $listeners = ["removed" => "render"];

    public function render()
    {
        return view('livewire.buttonbuy');
    }

    public function add(int $id)
    {
       $card = new CardRepository;
       $data = $card->addToCart($id);
       if($data === false){
        dd("product already exist");
       }else{
        $this->emit("added");
       }
    }
}
