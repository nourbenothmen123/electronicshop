<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ListeEnviesController extends Controller
{
    public function afficher_liste_envies()
    {
        $categoriesParentes = Category::whereNull('parent_id')->get();
        // Sélectionner les sous-catégories de chaque catégorie parente
    $categories = [];
    foreach ($categoriesParentes as $categorieParente) {
        $sousCategories = Category::where('parent_id', $categorieParente->id)->get();
        $categories[] = [
            'categorieParente' => $categorieParente,
            'sousCategories' => $sousCategories,
        ];
    }
        return view('client-views.liste-envies.liste-envies',compact('categories'));
    }
}
