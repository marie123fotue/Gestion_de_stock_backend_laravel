<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategorieController extends Controller
{
    /**
     * Afficher toutes les catégories
     * GET /api/categories
     */
    public function index()
    {
        return Categorie::with('produits')->get();
    }

    /**
     * Créer une nouvelle catégorie
     * POST /api/categories
     */
    public function store(Request $request)
    {
        // Créer un validateur personnalisé
        $validator = Validator::make($request->all(), [
            'nom' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'description' => 'nullable|string',


        ], [
            // Messages d'erreur personnalisés
            'nom.required' => 'Le nom de la catégorie est obligatoire',
            'nom.string' => 'Le nom doit être une chaîne de caractères',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères',
            'description.string' => 'La description doit être une chaîne de caractères',
            'nom.regex' => 'le nom ne doit pas contenir de caratere speciaux'
        ]);

        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $validator->errors()
            ], 422);
        }

        // Créer la catégorie avec Eloquent
        $categorie = Categorie::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Catégorie créée avec succès',
            'data' => $categorie
        ], 201);
    }


    /**
     * Afficher une catégorie spécifique
     * GET /api/categories/{id}
     */
    public function show($id)
    {
        // Trouver la catégorie par son ID avec ses produits
        $categorie = Categorie::with('produits')->find($id);

        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $categorie
        ], 200);
    }

    /**
     * Mettre à jour une catégorie
     * PUT/PATCH /api/categories/{id}
     */
    public function update(Request $request, $id)
    {
        // Trouver la catégorie
        $categorie = Categorie::find($id);

        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        }

        // Valider les données
        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Mettre à jour la catégorie
        $categorie->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Catégorie mise à jour avec succès',
            'data' => $categorie
        ], 200);
    }

    /**
     * Supprimer une catégorie
     * DELETE /api/categories/{id}
     */
    public function destroy($id)
    {
        // Trouver la catégorie
        $categorie = Categorie::find($id);

        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        }

        // Vérifier si la catégorie a des produits
        if ($categorie->produits()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de supprimer cette catégorie car elle contient des produits'
            ], 400);
        }

        // Supprimer la catégorie
        $categorie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Catégorie supprimée avec succès'
        ], 200);
    }
}
