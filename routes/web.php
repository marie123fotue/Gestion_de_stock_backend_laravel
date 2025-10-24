<?php

use App\Http\Controllers\PostControlleur;

use Illuminate\Support\Facades\Route;


Route::get('/produit', [PostControlleur::class, 'index']);

Route::get('/', function (\Illuminate\Http\Request $request) {

   
    // $post = new App\Models\Post();
    // $post->nom = 'spaghetti tres savoureux';
    // $post->prix = 500;
    // $post->description = 'spaghetti savoureux et de bonne qualite';
    // $post->categorie = 'patte alimentaire';
    // $post->save();   
// $post =\App\Models\Post::all('nom','description');
// $post = \App\Models\Post::find('patte alimentaire');
         $post =\App\Models\Post::where('categorie', 'patte alimentaire')->first();
// $post = \App\Models\Post::paginate(3);
    return $post ;
});
