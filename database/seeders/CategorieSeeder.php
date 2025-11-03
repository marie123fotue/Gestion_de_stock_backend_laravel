<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //function qui est excuter lors dulancement des seeders
    public function run(): void
    {
       

        // Tableau contenant toutes nos catégories
        $categories = [
            [
                'nom' => 'Riz parfumé & tendre',
                'description' => 'Un riz délicat et savoureux'
            ],
            [
                'nom' => 'Spaghetti gourmet',
                'description' => 'Pâtes italiennes haut de gamme'
            ],
            [
                'nom' => 'Huile raffinée de qualité',
                'description' => 'Huile végétale pure'
            ],
            [
                'nom' => 'Vin savoureux & raffiné',
                'description' => 'Vin rouge élégant'
            ],
            [
                'nom' => 'Lait nourrissant & crémeux',
                'description' => 'Lait entier riche en calcium'
            ],
            [
                'nom' => 'Biscuits croustillants',
                'description' => 'Snack sucré et croquant'
            ],
            [
                'nom' => 'Douceurs sucrées',
                'description' => 'Bonbons et sucreries'
            ],
            [
                'nom' => 'Soin dentaire Colgate',
                'description' => 'Dentifrice Colgate pour dents fortes'
            ],
            [
                'nom' => 'Produits doux pour bébé',
                'description' => 'Soins pour la peau de bébé'
            ],
            [
                'nom' => 'Jus frais & vitaminé',
                'description' => 'Jus de fruits naturel'
            ]
        ];
        //parcourons chaque categorie et inserons le dans la base de donnes
           foreach($categories as $cat){
            Categorie::create($cat);
           }

    }
}
