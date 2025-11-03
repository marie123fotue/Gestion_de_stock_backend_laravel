<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
    //les champs que l'on peut remplir




    protected $fillable = [
        'nom',
        'prix',
        'description',
        'categorie_id',
        'photo'

    ];

    //un produit  appartient a une seule categorie
    public function categorie(): BelongsTo
    {
    return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
