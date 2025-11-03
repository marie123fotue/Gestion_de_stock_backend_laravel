<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;
use App\Models\categorie;

Route::get('/', function () {
    return Produit::all();
});




Route::middleware('api')->prefix('api')->group(function () {
    // Routes pour les catégories
    Route::get('/categories', [CategorieController::class, 'index']);
    Route::post('/categories', [CategorieController::class, 'store']);
    Route::get('/categories/{id}', [CategorieController::class, 'show']);
    Route::put('/categories/{id}', [CategorieController::class, 'update']);
    Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);
    Route::get('/produits/categorie/{categorieId}', [ProduitController::class, 'getProduitsParCategorie']);

    // Routes pour les produits
    Route::get('/produits', [ProduitController::class, 'index']);
    Route::post('/produits', [ProduitController::class, 'store']);
    Route::get('/produits/{id}', [ProduitController::class, 'show']);
    Route::put('/produits/{id}', [ProduitController::class, 'update']);
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);

    // Route supplémentaire : produits par catégorie
    Route::get('/categories/{categorie_id}/produits', [ProduitController::class, 'getByCategorie']);
});
