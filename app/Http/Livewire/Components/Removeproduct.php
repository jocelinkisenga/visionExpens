<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Removeproduct extends Component
{
    public $product_id;
    public function render()
    {
        return view('livewire.components.removeproduct');
    }

    public function delete(){

        \CartFacade::remove($this->product_id);
        $this->emit("removed");
    }
}
