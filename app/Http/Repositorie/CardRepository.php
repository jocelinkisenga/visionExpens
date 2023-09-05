<?php
namespace App\Http\Repositorie;

use App\Models\Produit;

class CardRepository {

    public function addToCart(int $id){
        $product = Produit::find($id);
        $cartItem = \CartFacade::get($product->id);
        if(empty($cartItem)){
            \CartFacade::add([
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
            ]);
          return true;
        }
        else{
            return false;
        }
    }


    public function addQty(int $id, $quantity){

        \CartFacade::update($id,[
            "quantity" => $quantity
        ]);

    }

    public function plusQuantity($id){
        \CartFacade::update($id,[
            "quantity" => + 1
        ]);

    }

    public function minusQuantity($id){
        \CartFacade::update($id,[
            "quantity" => - 1
        ]);

    }


}
