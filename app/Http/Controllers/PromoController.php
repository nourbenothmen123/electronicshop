<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Category;
use App\Models\Variation;
use App\Models\Product;



class PromoController extends Controller
{
    public function afficher()
    {
        $promotions = Promotion::with(['categories', 'products', 'variations'])->get();
        return view('promotion', compact('promotions'));
    }
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        $variations = Variation::all();

        return view('forms.add-promotion', compact('categories', 'products', 'variations'));
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->categories()->detach();
        $promotion->products()->detach();
        $promotion->variations()->detach();
        $promotion->delete();
        
        return redirect()->route('promotion')->with('success', 'Promotion supprimée avec succès.');

    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $promotions = Promotion::where('name_promo', 'LIKE', '%' . $searchTerm . '%')->get();
        return view('promotion', compact('promotions'));
    }
    

    public function store(Request $request)
{
    $validated = $request->validate([
        'name_promo' => 'required|string|max:255',
        'type_promo' => 'required|array',
        'pourcentage_promo' => 'required|numeric|min:0|max:100',
        'date_deb_promo' => 'required|date',
        'date_fin_promo' => 'required|date|after:date_deb_promo',
        'categories' => 'nullable|array', //multiselect
        'products' => 'nullable|array',
        'variations' => 'nullable|array',
    ]);

    // If 'type_promo' is an array, you may want to join it into a single string
    $typePromo = implode(',', $validated['type_promo']);

    $promotion = Promotion::create([
        'name_promo' => $validated['name_promo'],
        'type_promo' => $typePromo, // Assign the joined string to type_promo
        'pourcentage_promo' => $validated['pourcentage_promo'],
        'date_deb_promo' => $validated['date_deb_promo'],
        'date_fin_promo' => $validated['date_fin_promo'],
    ]);

    // if (!empty($validated['categories'])) {
    //     $promotion->categories()->attach($validated['categories']);
    //         // Get variations associated with these products and attach them to the promotion
    //         $products = Product::whereIn('category_id', $validated['categories'])->get();
    //         $variations= Variation::whereIn('product_id', $products->id)->get();

    
    //         foreach ($products as $product) {
    //             // Apply the promotion to each variation
    //             $promotion->products()->attach($product->id);
    //             foreach($variations as $variation)
    //             {
    //                 $promotion->variations()->attach($variation->id);
    //             }
    //         }
    // }
     // Attaching categories, their products, and the variations of those products to the promotion
     if (!empty($validated['categories'])) {
        $promotion->categories()->attach($validated['categories']);

        // Get products associated with these categories
        $products = Product::whereIn('category_id', $validated['categories'])->get();

        foreach ($products as $product) {
            // Attach each product to the promotion
            $promotion->products()->attach($product->id);

            // Get variations associated with this product
            $variations = Variation::where('product_id', $product->id)->get();

            foreach ($variations as $variation) {
                // Attach each variation to the promotion
                $promotion->variations()->attach($variation->id);
            }
        }
    }


    // if (!empty($validated['products'])) {
    //     $promotion->products()->attach($validated['products']);
    // }
       // Attacher les produits si fournis
    //    if (!empty($validated['products'])) {
    //     $promotion->products()->attach($validated['products']);

    //     // Récupérer les variations associées à ces produits et les attacher à la promotion
    //     $variations = Variation::whereIn('product_id', $validated['products'])->get()->pluck('id')->toArray();
    //     if (!empty($variations)) {
    //         $promotion->variations()->attach($variations);
    //     }
    // }
        // Attach products and their variations if provided
        if (!empty($validated['products'])) {
            $promotion->products()->attach($validated['products']);
    
            // Get variations associated with these products and attach them to the promotion
            $variations = Variation::whereIn('product_id', $validated['products'])->get();
    
            foreach ($variations as $variation) {
                // event(new VariationAdded($variation));
                // Apply the promotion to each variation
                $promotion->variations()->attach($variation->id);
                // Trigger the event for each variation
            
            }
        }
    

    if (!empty($validated['variations'])) {
        $promotion->variations()->attach($validated['variations']);
    }

    return redirect()->route('promotion')->with('success', 'La Promotion est ajoutée avec succès.');
}
    public function show($id)
    {
        $promotion = Promotion::with(['categories', 'variations', 'products'])->findOrFail($id);
        return view('forms.show', compact('promotion'));
    }

    public function modifier_promo($id)
    {
        // Récupérer la promotion, les catégories, les produits et les variations
        $promotion = Promotion::with(['categories', 'products', 'variations'])->find($id);
    
        // Si type_promo est une chaîne délimitée, par exemple par des virgules, convertissez-la en tableau
        if (is_string($promotion->type_promo)) {
            $promotion->type_promo = explode(',', $promotion->type_promo);
        }
    
        $categories = Category::all();
        $products = Product::all();
        $variations = Variation::all();
        // Passer les données à la vue
        return view('forms.modifier-promotion', compact('promotion', 'categories', 'products', 'variations'));
    }
    
    public function modifier_promotion_traitement(Request $request)
{
    $request->validate([
        'name_promo' => 'required|max:240',
        'type_promo' => 'required|array',
        'pourcentage_promo' => 'required|numeric',
        'date_deb_promo' => 'required|date',
        'date_fin_promo' => 'required|date',
    ]);

    // Récupérer la promotion à modifier
    $promotion = Promotion::find($request->id);
    
    // Mettre à jour les attributs de la promotion
    $promotion->name_promo = $request->input('name_promo');
    $promotion->type_promo = implode(',', $request->input('type_promo')); // Convertir le tableau en chaîne délimitée par des virgules
    $promotion->pourcentage_promo = $request->input('pourcentage_promo');
    $promotion->date_deb_promo = $request->input('date_deb_promo');
    $promotion->date_fin_promo = $request->input('date_fin_promo');

    // Mettre à jour les relations (si applicable)
    if ($request->has('categories')) {
        $promotion->categories()->sync($request->input('categories'));
    }

    if ($request->has('products')) {
        $promotion->products()->sync($request->input('products'));
    }

    if ($request->has('variations')) {
        $promotion->variations()->sync($request->input('variations'));
    }

    // Sauvegarder les changements
    $promotion->save();

    return redirect('/promotion')->with('success', 'La promotion a été modifiée avec succès!');
}
// public function afficher_liste_promotions_categories(Request $request)
// {
//     $query = Promotion::with('categories');

//     // Récupérer les paramètres de recherche
//     $chercherPromotion = $request->input('chercherPromotion');
//     $chercherCatégorie = $request->input('chercherCatégorie');

//     // Appliquer le filtrage par nom de promotion
//     if ($chercherPromotion) {
//         $query->where('name_promo', 'like', '%' . $chercherPromotion . '%');
//     }

//     // Appliquer le filtrage par nom de catégorie
//     if ($chercherCatégorie) {
//         $query->whereHas('categories', function ($q) use ($chercherCatégorie) {
//             $q->where('name', 'like', '%' . $chercherCatégorie . '%');
//         });
//     }
//     $entries = request()->get('entries', 'all');
//         if ($entries !== 'all') {
//             $promotions = $query->paginate($entries);
//         } else {
//             $promotions = $query->get();
//         }

//         $totalPromotions = $query->count();

//     //$promotions = $query->get();

//     return view('Promotions-Categories',compact('promotions','chercherPromotion', 'chercherCatégorie','totalPromotions'));
// }
public function afficher_liste_promotions_categories(Request $request)
{
    $query = Promotion::with('categories');

    // Récupérer les paramètres de recherche
    $chercherPromotion = $request->input('chercherPromotion');
    $chercherCatégorie = $request->input('chercherCatégorie');
    $dateDebut = $request->input('dateDebut');
    $dateFin = $request->input('dateFin');


    // Appliquer le filtrage par nom de promotion
    if ($chercherPromotion) {
        $query->where('name_promo', 'like', '%' . $chercherPromotion . '%');
    }

    // Appliquer le filtrage par nom de catégorie
    if ($chercherCatégorie) {
        $query->whereHas('categories', function ($q) use ($chercherCatégorie) {
            $q->where('name', 'like', '%' . $chercherCatégorie . '%');
        });
    }
       // Appliquer le filtrage par date de début et date de fin de promotion
       if ($dateDebut) {
        $query->where('date_deb_promo', '>=', $dateDebut);
    }
    if ($dateFin) {
        $query->where('date_fin_promo', '=', $dateFin);
    }


    // Récupérer le nombre d'entrées par page
    $entries = $request->get('entries', 'all');
    if ($entries !== 'all') {
        $promotions = $query->paginate($entries);
    } else {
        $promotions = $query->get();
    }

    // Compter le nombre total de promotions
    $totalPromotions = $query->count();

    return view('Promotions-Categories', compact('promotions', 'chercherPromotion', 'chercherCatégorie', 'totalPromotions','dateDebut', 'dateFin'));
}
// public function afficher_liste_promotions_produits(Request $request)
// {
//     $query = Promotion::with('products');

//     // Récupérer les paramètres de recherche
//     $chercherPromotion = $request->input('chercherPromotion');
//     $chercherProduit = $request->input('chercherProduit');

//     // Appliquer le filtrage par nom de promotion
//     if ($chercherPromotion) {
//         $query->where('name_promo', 'like', '%' . $chercherPromotion . '%');
//     }

//     if ($chercherProduit) {
//         $query->whereHas('products', function ($q) use ($chercherProduit) {
//             $q->where('name', 'like', '%' . $chercherProduit . '%');
//         });
//     }

//     // Récupérer le nombre d'entrées par page
//     $entries = $request->get('entries', 'all');
//     if ($entries !== 'all') {
//         $promotions = $query->paginate($entries);
//     } else {
//         $promotions = $query->get();
//     }

//     // Compter le nombre total de promotions
//     $totalPromotions = $query->count();

//     return view('Promotions-Produits', compact('promotions', 'chercherPromotion', 'chercherProduit', 'totalPromotions')); 
// }
public function afficher_liste_promotions_produits(Request $request)
{
    $query = Promotion::with('products');

    // Récupérer les paramètres de recherche
    $chercherPromotion = $request->input('chercherPromotion');
    $chercherProduit = $request->input('chercherProduit');
    $dateDebut = $request->input('dateDebut');
    $dateFin = $request->input('dateFin');


    // Appliquer le filtrage par nom de promotion
    if ($chercherPromotion) {
        $query->where('name_promo', 'like', '%' . $chercherPromotion . '%');
    }

    // Appliquer le filtrage par nom de produit
    if ($chercherProduit) {
        $query->whereHas('products', function ($q) use ($chercherProduit) {
            $q->where('name', 'like', '%' . $chercherProduit . '%');
        });
    }
        // Appliquer le filtrage par date de début et date de fin de promotion
        if ($dateDebut) {
            $query->where('date_deb_promo', '>=', $dateDebut);
        }
        if ($dateFin) {
            $query->where('date_fin_promo', '=', $dateFin);
        }

    // Récupérer le nombre d'entrées par page
    $entries = $request->get('entries', 'all');
    if ($entries !== 'all') {
        $promotions = $query->paginate($entries);
    } else {
        $promotions = $query->get();
    }

    // Compter le nombre total de promotions (sans pagination)
    $totalPromotions = $query->count();

    return view('Promotions-Produits', compact('promotions', 'chercherPromotion', 'chercherProduit', 'totalPromotions','dateDebut', 'dateFin'));
}
public function afficher_liste_promotions_variations(Request $request)
{
    $query = Promotion::with('variations');

    // Récupérer les paramètres de recherche
    $chercherPromotion = $request->input('chercherPromotion');
    $chercherVariation = $request->input('chercherVariation');
    $dateDebut = $request->input('dateDebut');
    $dateFin = $request->input('dateFin');

    // Appliquer le filtrage par nom de promotion
    if ($chercherPromotion) {
        $query->where('name_promo', 'like', '%' . $chercherPromotion . '%');
    }

    // Appliquer le filtrage par nom de produit
    if ($chercherVariation) {
        $query->whereHas('variations', function ($q) use ($chercherVariation) {
            $q->where('name', 'like', '%' . $chercherVariation . '%');
        });
    }
    // Appliquer le filtrage par date de début et date de fin de promotion
    if ($dateDebut) {
        $query->where('date_deb_promo', '>=', $dateDebut);
    }
    if ($dateFin) {
        $query->where('date_fin_promo', '=', $dateFin);
    }


    // Récupérer le nombre d'entrées par page
    $entries = $request->get('entries', 'all');
    if ($entries !== 'all') {
        $promotions = $query->paginate($entries);
    } else {
        $promotions = $query->get();
    }

    // Compter le nombre total de promotions (sans pagination)
    $totalPromotions = $query->count();
    return view('Promotions-Variations', compact('promotions', 'chercherPromotion', 'chercherVariation', 'totalPromotions','dateDebut', 'dateFin'));


}
    

}
