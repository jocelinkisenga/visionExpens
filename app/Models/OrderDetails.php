<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","order_id", "product_id","product_quantity"];

    public function product(){
        return $this->belongsTo(Produit::class,'product_id');
    }


}
