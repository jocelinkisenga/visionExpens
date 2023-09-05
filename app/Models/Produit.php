<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','categorie_id','name','price','quantity','path'];

    public function hystories(){
        return $this->hasMany(HystoryProduct::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetails::class);
    }
}
