<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contentscount extends Component
{

    protected $listeners = ["added" => "render", "removed"=> "render", "ordered" => "render"];
    public int $count;
    public $quantity;

    public function render()
    {
        $this->count = count(\CartFacade::getContent());
        return view('livewire.contentscount');
    }
}
