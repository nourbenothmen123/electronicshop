<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Marque;

class ProductBannerController extends Controller
{
    public function afficher_categories()
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

        return view('client-views.produits.ProduitsCategorie-banner',compact('categories'));
    }
    public function afficher_Produits_Categorie(Request $request ,$idCategorie)
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
    
    $categoriesProduit=Category::all();
    //trouver la catégorie 
        $categorieSelectionné=Category::find($idCategorie);
        
        // $query = Product::query();
        $produitsCategorieSelectionné=$categorieSelectionné->products;

        if ($request->has('brands')) {
            $brandIds = $request->input('brands');
            $produitsCategorieSelectionné->whereIn('id_marque', $brandIds);
        }
    
        if ($request->has('categories')) {
            $categoryIds = $request->input('categories');
            $$produitsCategorieSelectionné->whereIn('category_id', $categoryIds);
        }
    
        // $produits = $query->get();
        $produitsCategorieSelectionné=$categorieSelectionné->products;
        $nomCategorieSelectionné = $categorieSelectionné->name;
        $marques=Marque::all();
        return view('client-views.produits.produitsCategorie-banner',compact('produitsCategorieSelectionné','categories','categoriesProduit','nomCategorieSelectionné','marques'));
    }
}
