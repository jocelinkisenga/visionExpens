<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Utilities\FormatDate;

class Categorie extends Model
{
   private $created_at, $updated_at;
    use HasFactory;
    
    protected $fillable = ['user_id','name'];

    public function produits(){
        return $this->hasMany(Produit::class);
    }

}
