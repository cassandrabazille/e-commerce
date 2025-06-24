<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Categorie extends Model
{
    use HasUuids; 
    protected $primaryKey="id_categorie";
    public $incrementing=false;
    protected $keyType="string";
    protected $fillable = ['name', 'slug', 'description'];
    public function produits() {
        return $this->hasMany(Produit::class, 'id_categorie', 'id_categorie');
    }
}
