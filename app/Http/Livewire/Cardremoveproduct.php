<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cardremoveproduct extends Component
{
    public $product_id;

    public function render()
    {
        return view('livewire.cardremoveproduct');
    }

    public function delete(){

        \CartFacade::remove($this->product_id);
        $this->emit("removed");
        
    }
}
