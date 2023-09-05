<?php

namespace App\Http\Livewire\Rapport;

use App\Http\Repositorie\StockRepositorie;
use App\Models\HystoryProduct;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Stockrapport extends Component
{
    public $data, $date_from, $date_to, $from, $to;

    public function search(){
     
     
       
    }

    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        
        $stock = new StockRepositorie;
        $this->data = $stock->stock($this->date_from, $this->date_to);

        return view('livewire.rapport.stockrapport');
    }


}
    