<?php




use App\Http\Controllers\PostControlleur;

Route::get('/', [PostControlleur::class, 'index']);
Route::get('{categorie}', [PostControlleur::class, 'show']);

