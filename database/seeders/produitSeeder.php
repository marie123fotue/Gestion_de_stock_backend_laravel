<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tableau contenant tous nos produits
        $produits = [
            // ========== CATÉGORIE 1 : RIZ (categorie_id = 1) ==========
            [
                'nom' => 'Riz Parfumé mémé Long Grain 25KG',
                'description' => 'Riz de qualité supérieure, grain long',
                'prix' => 13000,
                'photo' => './../public/image/LaravlProjetProduit\public\image\Riz parfumé mémé Long Grain - 25KG _ Glotelho Cameroun-13-000_files\riz-meme-35-000.jpg',
                'categorie_id' => 1
            ],
            [
                'nom' => 'Riz Lion Prestige 25 Kg',
                'description' => 'Riz prestige de qualité',
                'prix' => 12500,
                'photo' => 'riz-lion-prestige-25kg.jpg',
                'categorie_id' => 1
            ],
            [
                'nom' => 'Riz Thailandais vitali 25KG - 25% Brisure-Qualité',
                'description' => 'Riz thaïlandais de qualité',
                'prix' => 12500,
                'photo' => 'riz-vitali-25kg.jpg',
                'categorie_id' => 1
            ],
            [
                'nom' => 'Riz Parfume royal umbrella 5KG',
                'description' => 'Riz parfumé thaï premium',
                'prix' => 7500,
                'photo' => 'riz-royal-umbrella-5kg.jpg',
                'categorie_id' => 1
            ],

            // ========== CATÉGORIE 2 : SPAGHETTI (categorie_id = 2) ==========
            [
                'nom' => 'Spaghetti Pasta Gold 500g',
                'description' => 'Pâtes de qualité supérieure',
                'prix' => 600,
                'photo' => 'spaghetti-pasta-gold-500g.jpg',
                'categorie_id' => 2
            ],
            [
                'nom' => 'Spaghetti Pasta first 500g',
                'description' => 'Pâtes italiennes',
                'prix' => 500,
                'photo' => 'spaghetti-pasta-first-500g.jpg',
                'categorie_id' => 2
            ],
            [
                'nom' => 'Spaghetti selva',
                'description' => 'Blé dur de qualité',
                'prix' => 550,
                'photo' => 'spaghetti-selva-500g.jpg',
                'categorie_id' => 2
            ],
            [
                'nom' => 'Spaghetti Pasta barka',
                'description' => 'Pâtes économiques',
                'prix' => 400,
                'photo' => 'spaghetti-pasta-barka-500g.jpg',
                'categorie_id' => 2
            ],
            [
                'nom' => 'Spaghetti salaka',
                'description' => 'Pâtes alimentaires',
                'prix' => 550,
                'photo' => 'spaghetti-salaka.jpg',
                'categorie_id' => 2
            ],

            // ========== CATÉGORIE 3 : HUILE (categorie_id = 3) ==========
            [
                'nom' => 'Huile Raffinée - Mayor- Made in Cameroun -1L',
                'description' => 'Huile végétale raffinée',
                'prix' => 1450,
                'photo' => 'huile-mayor-1l.jpg',
                'categorie_id' => 3
            ],
            [
                'nom' => 'Matinal-au-lait 200g',
                'description' => 'Margarine au lait',
                'prix' => 2700,
                'photo' => 'matinal-au-lait-200g.jpg',
                'categorie_id' => 3
            ],

            // ========== CATÉGORIE 5 : LAIT (categorie_id = 5) ==========
            [
                'nom' => 'Lait concentré Pavani 1kg',
                'description' => 'Lait concentré sucré',
                'prix' => 1400,
                'photo' => 'lait-pavani-1kg.jpg',
                'categorie_id' => 5
            ],
            [
                'nom' => 'Lait en poudre nido 2500g',
                'description' => 'Lait en poudre fortifié',
                'prix' => 18000,
                'photo' => 'lait-nido-2500g.jpg',
                'categorie_id' => 5
            ],
            [
                'nom' => 'Chocolat-en-poudre 800g',
                'description' => 'Chocolat matinal',
                'prix' => 3700,
                'photo' => 'chocolat-poudre-800g.jpg',
                'categorie_id' => 5
            ],

            // ========== CATÉGORIE 8 : SOIN DENTAIRE (categorie_id = 8) ==========
            [
                'nom' => 'Dentifrice gel colgate max fresh menthe fraiche 75 ml',
                'description' => 'Menthe fraîche',
                'prix' => 1500,
                'photo' => 'colgate-menthe-75ml.jpg',
                'categorie_id' => 8
            ],
            [
                'nom' => 'Dentifrice colgate total active prevention au charbon 75 ml',
                'description' => 'Au charbon actif',
                'prix' => 2000,
                'photo' => 'colgate-charbon-75ml.jpg',
                'categorie_id' => 8
            ],
            [
                'nom' => 'Dentifrice colgate maxfresh',
                'description' => 'Fraîcheur maximale',
                'prix' => 1600,
                'photo' => 'colgate-maxfresh.jpg',
                'categorie_id' => 8
            ],
            [
                'nom' => 'Colgate sensitive 75_ml',
                'description' => 'Pour dents sensibles',
                'prix' => 3500,
                'photo' => 'colgate-sensitive-75ml.jpg',
                'categorie_id' => 8
            ],

            // ========== CATÉGORIE 9 : PRODUITS BÉBÉ (categorie_id = 9) ==========
            [
                'nom' => 'Lingette pour bébé',
                'description' => 'Lingettes douces pour bébé',
                'prix' => 700,
                'photo' => 'lingette-bebe.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Ensemble ulta doux pour bébé',
                'description' => 'Kit complet pour bébé',
                'prix' => 8000,
                'photo' => 'ensemble-bebe.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Couches jetables Softcare 11kg Gold',
                'description' => 'Taille 4 - 6 à 11kg',
                'prix' => 1500,
                'photo' => 'couches-softcare-gold.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Protex-Pharmapure 100g charbon',
                'description' => 'Savon au charbon',
                'prix' => 1000,
                'photo' => 'protex-charbon.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Trottinette pour Bebe',
                'description' => 'Trotteur réglable 3 niveaux avec musique 6-18 mois',
                'prix' => 70000,
                'photo' => 'trottinette-bebe.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Couches Sofware Premuin',
                'description' => 'Couches premium soft',
                'prix' => 7000,
                'photo' => 'couches-premium.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Poudre Tal de soin Tou chou pour bebe',
                'description' => 'Poudre talc de soin',
                'prix' => 1200,
                'photo' => 'poudre-talc-bebe.jpg',
                'categorie_id' => 9
            ],
            [
                'nom' => 'Lotion corporelle super hydratant',
                'description' => 'Babylove ultra-sensible 250ml',
                'prix' => 3500,
                'photo' => 'lotion-bebe.jpg',
                'categorie_id' => 9
            ],
        ];

        // Parcourir chaque produit et l'insérer dans la tables produits 
        foreach ($produits as $produit) {
            Produit::create($produit);
        }
    }
}