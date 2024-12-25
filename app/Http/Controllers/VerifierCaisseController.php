<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class VerifierCaisseController extends Controller
{
    public function afficher_caisse()
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
        return view('client-views.checkout.checkout',compact('categories'));
    }
}
