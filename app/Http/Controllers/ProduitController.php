<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Afficher tous les produits
     * GET /api/produits
     */
    public function index()
    {
$produits = Produit::with('categorie')->get();
        // Ajouter l'URL complète de la photo
        foreach ($produits as $produit) {
            if ($produit->photo) {
                $produit->photo_url = url('storage/' . $produit->photo);
            }
        }

        return response()->json($produits);
    }

    /**
     * Créer un nouveau produit
     * POST /api/produits
     */
    public function store(Request $request)
    {

        //  Valider les données reçues
        // le request contient mes donnees
    // $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'prix' => 'required|numeric|min:0',
    //         'description' => 'nullable|string',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'categorie_id' => 'required|exists:categories,id'
    //     ]);


        // Récupérer toutes les données

        $data = $request->all();



        // Gérer l'upload de la photo si elle existe
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('produits', 'public');
            $data['photo'] = $photoPath;
        }


        // Créer le produit avec Eloquent
        $produit = Produit::create($data);
        // Charger la relation categorie
        $produit->load('categories');

        // Ajouter l'URL de la photo
        if ($produit->photo) {
            $produit->photo_url = url('storage/' . $produit->photo);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produit créé avec succès',
            'data' => $produit
        ], 201);
    }

    /**
     * Afficher un produit spécifique
     * GET /api/produits/{id}
     */
    public function show($id)
    {
        // Trouver le produit par son ID avec sa catégorie
        $produit = Produit::with('categorie')->find($id);

        // Vérifier si le produit existe
        if (!$produit) {
            return response()->json([
                'success' => false,
                'message' => 'Produit non trouvé'
            ], 404);
        }

        // Ajouter l'URL de la photo
        if ($produit->photo) {
            $produit->photo_url = url('storage/' . $produit->photo);
        }

        return response()->json([
            'success' => true,
            'data' => $produit
        ], 200);
    }

    /**
     * Mettre à jour un produit
     * PUT/PATCH /api/produits/{id}
     */
    public function update(Request $request, $id)
    {
        // Trouver le produit
        $produit = Produit::find($id);

        // Vérifier si le produit existe
        if (!$produit) {
            return response()->json([
                'success' => false,
                'message' => 'Produit non trouvé'
            ], 404);
        }

        // Valider les données
        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'prix' => 'sometimes|numeric|min:0',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'sometimes|exists:categories,id'
        ]);

        // Récupérer les données
        $data = $request->all();

        // Gérer l'upload de la nouvelle photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($produit->photo) {
                Storage::disk('public')->delete($produit->photo);
            }

            // Sauvegarder la nouvelle photo
            $photoPath = $request->file('photo')->store('produits', 'public');
            $data['photo'] = $photoPath;
        }

        // Mettre à jour le produit
        $produit->update($data);

        // Charger la relation categorie
        $produit->load('categorie');

        // Ajouter l'URL de la photo
        if ($produit->photo) {
            $produit->photo_url = url('storage/' . $produit->photo);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produit mis à jour avec succès',
            'data' => $produit
        ], 200);
    }

    /**
     * Supprimer un produit
     * DELETE /api/produits/{id}
     */
    public function destroy($id)
    {
        // Trouver le produit
        $produit = Produit::find($id);

        // Vérifier si le produit existe
        if (!$produit) {
            return response()->json([
                'success' => false,
                'message' => 'Produit non trouvé'
            ], 404);
        }

        // Supprimer la photo si elle existe
        if ($produit->photo) {
            Storage::disk('public')->delete($produit->photo);
        }

        // Supprimer le produit de la base de données
        $produit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produit supprimé avec succès'
        ], 200);
    }

    /**
     * Obtenir tous les produits d'une catégorie spécifique
     * GET /api/categories/{categorie_id}/produits
     */
    public function getByCategorie($categorie_id)
    {
        // Récupérer les produits de cette catégorie
        $produits = Produit::where('categorie_id', $categorie_id)
            ->with('categorie')
            ->get();

        // Ajouter l'URL de la photo pour chaque produit
        foreach ($produits as $produit) {
            if ($produit->photo) {
                $produit->photo_url = url('storage/' . $produit->photo);
            }
        }

        return response()->json([
            'success' => true,
            'data' => $produits
        ], 200);
    }
}
