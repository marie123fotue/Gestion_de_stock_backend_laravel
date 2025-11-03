<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Relations\HasMany;


class categorie extends Model
{
    //les differents champs de  tables que l'on peut modifier 

    protected $fillable = [
        'nom',
        'description'
    ];

    // une categorie  peut avoir plusieurs produits

    public function  produits(): HasMany
    {
        return $this->HasMany(Produit::class);
    }
}
