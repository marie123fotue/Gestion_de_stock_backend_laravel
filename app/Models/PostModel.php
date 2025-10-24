<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
     public static function getAll()
    {
        return [
            ["nom" => "Spaghetti gourmet", "description" => "Pâtes italiennes haut de gamme"],
            ["nom" => "Huile raffinée de qualité", "description" => "Huile végétale pure"],
            ["nom" => "Vin savoureux & raffiné", "description" => "Vin rouge élégant"],
             ["nom" => "wisky  de qualité", "description" => "Huile végétale pure"],
            ["nom" => "chocolat savoureux & raffiné", "description" => "Vin rouge élégant"],
        ];
    }
}
