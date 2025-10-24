<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;


class PostControlleur extends Controller
{ 
    public function index()
    {
        $categories = PostModel::getAll();

        $nbre = count($categories);
 
        return view('home', [
            'categories' => $categories,
            'nbreProduit' => $nbre
        ]);
    }
    public function show($nom){
        dd($nom);
    
    }

}
