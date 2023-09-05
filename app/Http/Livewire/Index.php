<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Auth;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $cardContents;
    public $quantity;

    protected $listeners = ["added" => "render","removed" => "render"];


    public function render()
    {
        $this->cardContents = \CartFacade::getContent();
        $this->products = Produit::where("user_id",Auth::user()->id)->get();
        return view('livewire.index');
    }

    public function modify(int $id){


        \CartFacade::update($id,[
            "quantity" => $this->quantity
        ]);
        $this->emptyQuantity();
    }

    private  function emptyQuantity(){
        $this->quantity = " ";
    }



}
