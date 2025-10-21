<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;


class PostControlleur extends Controller
{ 
    public function index()
    {
        $categories = PostModel::getAll();

        return view('home', [
            'categories' => $categories
        ]);
    }
    public function show($nom){
        dd($nom);
    
    }
}
