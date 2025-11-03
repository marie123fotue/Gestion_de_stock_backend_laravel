<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

// Routes pour les catégories
Route::get('/categories', [CategorieController::class, 'index']);           // Lire toutes les catégories
Route::post('/categories', [CategorieController::class, 'store']);          // Créer une catégorie
Route::get('/categories/{id}', [CategorieController::class, 'show']);       // Lire une catégorie
Route::put('/categories/{id}', [CategorieController::class, 'update']);     // Modifier une catégorie
Route::delete('/categories/{id}', [CategorieController::class, 'destroy']); // Supprimer une catégorie

// Routes pour les produits
Route::get('/produits', [ProduitController::class, 'index']);
Route::post('/produits', [ProduitController::class, 'store']);
Route::get('/produits/{id}', [ProduitController::class, 'show']);
Route::put('/produits/{id}', [ProduitController::class, 'update']);
Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);


// Route supplémentaire : produits par catégorie
Route::get('categories/{categorie_id}/produits', [ProduitController::class, 'getByCategorie']);
