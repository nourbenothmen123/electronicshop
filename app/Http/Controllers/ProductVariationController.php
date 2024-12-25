<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ValeurAttribute; 

use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;

class ProductVariationController extends Controller
{
//     public function afficher_variation_produit($idProduit)
//     {
//         $produit = Product::find($idProduit);
        

//         if ($produit) {
//             $productVariations=$produit->variations()->with('valeurAttributes')->get();
//             return view('client-views.variations.product-default', compact('productVariations','produit'));
//         } else {
//             // Gérer le cas où aucun produit n'est trouvé avec l'ID donné
//             return response()->json(['message' => 'Produit non trouvé'], 404);
//         }
//     }
// public function afficher_variation_produit($idProduit)
// {
//     $produit = Product::find($idProduit);

//     if ($produit) {
//         // Récupérer les variations du produit avec les valeurs attributs
//         $productVariations = $produit->variations()->with('valeurattribue.attribute')->get();
        
//         return view('client-views.variations.product-default', compact('productVariations','produit'));
//     } else {
//         // Gérer le cas où aucun produit n'est trouvé avec l'ID donné
//         return response()->json(['message' => 'Produit non trouvé'], 404);
//     }
// }

public function afficher_variation_produit($idProduit)
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
//trouver la catégorie 
    // $categorieSelectionné=Category::find($idCategorie);
    // $produitsCategorieSelectionné=$categorieSelectionné->products;

    $produit = Product::find($idProduit);

    if ($produit) {
        $productVariations = $produit->variations()->with('valeurAttributes.attribute')->get();
        
        // Exemple d'utilisation pour afficher les noms et les valeurs des attributs
        foreach ($productVariations as $variation) {
            foreach ($variation->valeurAttributes as $valeurAttribute) {
                $nomAttribut = $valeurAttribute->attribute->name;
                $valeurAttribut = $valeurAttribute->valeur;
                // Utilisez $nomAttribut et $valeurAttribut comme vous le souhaitez
            }
        }

        return view('client-views.variations.product-default', compact('productVariations','produit','categories'));
    } else {
        return response()->json(['message' => 'Produit non trouvé'], 404);
    }
}

// public function afficher_Produits_Categorie($idCategorie)
// {
//     $categoriesParentes = Category::whereNull('parent_id')->get();
//     // Sélectionner les sous-catégories de chaque catégorie parente
// $categories = [];
// foreach ($categoriesParentes as $categorieParente) {
//     $sousCategories = Category::where('parent_id', $categorieParente->id)->get();
//     $categories[] = [
//         'categorieParente' => $categorieParente,
//         'sousCategories' => $sousCategories,
//     ];
// }
// //trouver la catégorie 
//     $categorieSelectionné=Category::find($idCategorie);
//     $produitsCategorieSelectionné=$categorieSelectionné->products;

//     return view('client-views.produits.shop-fullwidth-banner',compact('produitsCategorieSelectionné','categories'));
// }
}

