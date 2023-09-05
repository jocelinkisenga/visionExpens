<?php

namespace App\Http\Livewire;

use App\Http\Repositorie\CardRepository;
use App\Http\Repositorie\OrderRepository;
use Livewire\Component;

class Cardcontents extends Component
{
    protected $listeners = ["added" => "render"];
    public $cardContents;
    public $quantity;
    public $input_quantity;


    public $total;
    public function render()
    {
        $this->cardContents = \CartFacade::getContent();
        $this->total = \CartFacade::getTotal();
        return view('livewire.cardcontents');
    }

    public function plus(int $id){
        $card = new CardRepository;
        $card->plusQuantity($id);
    }

    public function addQuantity(int $id){
            $card = new CardRepository;
            $card->addQty($id,$this->input_quantity);

    }

    public function minus(int $id){
        $card = new CardRepository;
        $card->minusQuantity($id);
    }

        public function delete(int $id){

        \CartFacade::remove($id);
        $this->cardContents = \CartFacade::getContent();
        $this->emit("removed");

    }

public function store_order(){
    $order = new OrderRepository;
    $order->storeOrder();
    $this->emit("ordered");
}


}
