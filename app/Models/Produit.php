<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
   protected $fillable=['name','slug','description','id_categorie', 'price', 'image'];
   public function categorie(){
    return $this->belongsTo(Categorie::class, 'id_categorie', 'id_categorie');
   }
}