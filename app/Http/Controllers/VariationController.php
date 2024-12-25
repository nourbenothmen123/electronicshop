<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variation;
use App\Models\Product;
use App\Models\ValeurAttribute;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Events\VariationAdded;


class VariationController extends Controller
{
    public function afficher(){
        
        $variations = Variation::query();
    
        if(request()->has('search'))
        {
            $variations = $variations->where('name','like','%'.request()->get('search').'%');
        }
    
        //$variations = $variations->get();
    //     $entries = request()->get('entries', 10);
    // $variations = $variations->paginate($entries);
    $entries = request()->get('entries', 'all');

//$variations = Variation::query();

if ($entries !== 'all') {
    $variations = $variations->paginate($entries);
} else {
    $variations = $variations->get();
}
$totalEntries = $variations->count();
        return view('index4',compact('variations','totalEntries'));
    }
//     public function store(Request $request)
//     {
//         request()->validate([
//             'nomvariation'=>'required|min:2|max:240',
//             'prix'=>'required|numeric',
//             'quantité_en_stock'=>'required|integer',
//             'id_produit'=>'exists:products,id',
//             'image_variation' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',       
//         ]);
//         $image = $request->file('image_variation');
//         $imageName = time() . '_' . $image->getClientOriginalName();
//         $image->move(public_path('images'), $imageName);
//         $variation = new Variation();
//         $variation->name = $request->input('nomvariation');
//         $variation->prix= $request->input('prix');
//         $variation->quantity_stock= $request->input('quantité_en_stock');
//         $variation->variation_image = $imageName;

//         $product = Product::find($request->input('id_produit'));
//         if ($product) {
//             $variation->product_id = $product->id;
//         } else {
//             // Gérer le cas où le produit n'existe pas
//         }
//         $variation->save();
//         $variations = Variation::all();
//          // Récupérer la catégorie associée au produit
//     $category = $product->category;

//     // // Récupérer les attributs de la catégorie
//     $categoryAttributes = $category->attributes;
//     dump($categoryAttributes);

//     // Retourner la vue avec les données nécessaires
//     return view('forms.ajouter-variation-form', [
//         'categoryAttributes' => $categoryAttributes,
//     ]);
//     return redirect()->route('index3');

// }
// public function store(Request $request)
// {
//     request()->validate([
//         'nomvariation'=>'required|min:2|max:240',
//         'prix'=>'required|numeric',
//         'quantité_en_stock'=>'required|integer',
//         'id_produit'=>'exists:products,id',
//         'image_variation' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',       
//     ]);

//     $image = $request->file('image_variation');
//     $imageName = time() . '_' . $image->getClientOriginalName();
//     $image->move(public_path('images'), $imageName);

//     $variation = new Variation();
//     $variation->name = $request->input('nomvariation');
//     $variation->prix= $request->input('prix');
//     $variation->quantity_stock= $request->input('quantité_en_stock');
//     $variation->variation_image = $imageName;

//     $product = Product::find($request->input('id_produit'));
//     if ($product) {
//         $variation->product_id = $product->id;
//     } else {
//         // Gérer le cas où le produit n'existe pas
//     }
//     $variation->save();
    

//    // Récupérer la catégorie associée au produit
//    $category = $product->category;

//    // Initialiser $categoryAttributes à une valeur par défaut
//    $categoryAttributes = [];

//    // Vérifier si la catégorie existe avant de récupérer ses attributs
//    if ($category) {
//        // Récupérer les attributs de la catégorie
//        $categoryAttributes = $category->attributes;
     
//    }
//    $products = Product::all();
//      // Vérifier si $categoryAttributes n'est pas rempli
//      if ($categoryAttributes->isEmpty()) {
//         return redirect('/index4')->with('error', 'Vous devez ajouter des attributs pour la catégorie pour ajouter les valeurs.');
//     }
  

//    return redirect('/ajouter-ValeurAttribute-form')->with(['variation' => $variation, 'categoryAttributes' => $categoryAttributes]);

// }


public function selectionner_produit()
{
  
    $products = Product::all();
    return view('forms.ajouter-variation-form', ['products' => $products]);

}
public function destroy($id)
{
    $variation=Variation::where('id',$id)->firstOrFail();

    $variation->delete();
    $variations = Variation::all();
    $totalEntries = $variations->count();
    return view('/index4',compact('variations','totalEntries'))->with('success','la variation est supprimée avec succée !');
}
public function modifier_variation($id){
    $variations=Variation::find($id);
    $products = Product::all();
    $categoryAttributes = [];
    $valeurAttributes = [];

    if ($variations->product && $variations->product->category) {
        $categoryAttributes = $variations->product->category->attributes;
        $valeurAttributes = DB::table('valeurattribue')
            ->where('variation_id', $variations->id)
            ->get();
    }
    return view ('forms.modifier-variation-form',compact('variations','products','categoryAttributes', 'valeurAttributes'));

}
// public function modifier_variation_traitement(Request $request)
// {
//     $request->validate([
//         'nomvariation'=>'required|min:2|max:240',
//         'prix'=>'required|numeric',
//         'quantité_en_stock'=>'required|integer',
//         'id_produit'=>'exists:products,id', 
//         'image_variation' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

//     ]);
//     // $image = $request->file('image_variation');
//     // $imageName = time() . '_' . $image->getClientOriginalName();
//     // $image->move(public_path('images'), $imageName);
   
//     $variation = Variation::find($request->id);
//     $variation->name = $request->nomvariation;
//     $variation->prix = $request->prix;
//     $variation->quantity_stock = $request->quantité_en_stock;
//     $variation->product_id = $request->id_produit;
//     // $variation->variation_image = $imageName;
//     if ($request->hasFile('image_variation')) {
//         // Supprimer l'ancienne image si elle existe
//         if ($variation->variation_image) {
//             // Supprimer l'ancienne image du dossier public/images
//             $oldImagePath = public_path('images/' . $variation->variation_image);
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         // Enregistrer la nouvelle image avec son nom original
//         $imagePath = $request->file('image_variation')->move(public_path('images'), $request->file('image_variation')->getClientOriginalName());
//         $variation->variation_image = $request->file('image_variation')->getClientOriginalName();
//     }

//     $variation->update();
//     $product = Product::find($request->input('id_produit'));
//        // Récupérer la catégorie associée au produit
//    $category = $product->category;
//     $categoryAttributes = [];

//     // Vérifier si la catégorie existe avant de récupérer ses attributs
//     if ($category) {
//         // Récupérer les attributs de la catégorie
//         $categoryAttributes = $category->attributes;
      
//     }
    
//     // Récupérer les valeurs des attributs de cette variation
//     $valeurAttributes = DB::table('valeurattribue')
//         ->where('variation_id', $variation->id)
//         ->get();
        
//     // Vérifier si $categoryAttributes n'est pas rempli
//      if ($categoryAttributes->isEmpty()) {
//         return redirect('/index4')->with('success', 'la variation est modifié avec succès ! pas de valeurs à modifié');
//     }
    
//     return redirect('/modifier-ValeurAttribute-form')->with(['variation' => $variation, 'categoryAttributes' => $categoryAttributes, $variation, 'valeurAttributes' => $valeurAttributes]);
// }
// public function selectionner_ValeurAttribute($name,$productName)
// {
//     $variation = Variation::where('name', $name)->first();
//     $product = Product::where('name', $productName)->with('category')->first();
//     // Charger les attributs de la catégorie
//     $categoryAttributes = $product->category->attributes;
//     return view('forms.ajouter-valeur-attribute-form',compact('variation','product','categoryAttributes'));

// }
public function selectionner_ValeurAttribut()
{
    $variation = session('variation');
    $categoryAttributes = session('categoryAttributes');

    return view('forms.ajouter-valeur-attribute-form', [
        'variation' => $variation,
        'categoryAttributes' => $categoryAttributes,
    ]);

}

public function modifier_ValeurAttribut()
{
    $variation = session('variation');
    $categoryAttributes = session('categoryAttributes');
    $valeurAttributes=session('valeurAttributes');

    return view('forms.modifier-valeur-attribut-form', [
        'variation' => $variation,
        'categoryAttributes' => $categoryAttributes,
        'valeurAttributes'=>$valeurAttributes,
    
    ]);

}


// public function store(Request $request)
// {
//     request()->validate([
//         'nomvariation' => 'required|min:2|max:240',
//         'prix' => 'required|numeric',
//         'quantité_en_stock' => 'required|integer',
//         'id_produit' => 'exists:products,id',
//         'image_variation' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'attributes' => 'required|array',
//         'attributes.*.id_attribute' => 'required|exists:attributes,id',
//         'attributes.*.valeur' => 'required|string|max:255',
//     ]);

//     $image = $request->file('image_variation');
//     $imageName = time() . '_' . $image->getClientOriginalName();
//     $image->move(public_path('images'), $imageName);

//     $variation = new Variation();
//     $variation->name = $request->input('nomvariation');
//     $variation->prix = $request->input('prix');
//     $variation->quantity_stock = $request->input('quantité_en_stock');
//     $variation->variation_image = $imageName;
//     $variation->product_id = $request->input('id_produit');
//     $variation->save();

//     foreach ($request->input('attributes') as $attribute) {
//         DB::table('valeurattribue')->insert([
//             'attribut_id' => $attribute['id_attribute'],
//             'variation_id' => $variation->id,
//             'valeur' => $attribute['valeur'],
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);
//     }

//     return redirect('/Valeur-Attribute')->with('success', 'La valeur d\'attribut a bien été modifiée avec succès !');
// }
// public function store(Request $request)
// {
//     $request->validate([
//         'nomvariation' => 'required|min:2|max:240',
//         'prix' => 'required|numeric',
//         'quantité_en_stock' => 'required|integer',
//         'id_produit' => 'exists:products,id',
//         'image_variation' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'attributes' => 'required|array',
//         'attributes.*.id_attribute' => 'required|exists:attributes,id',
//         'attributes.*.valeur' => 'required|string|max:255',
//     ]);

//     $image = $request->file('image_variation');
//     $imageName = time() . '_' . $image->getClientOriginalName();
//     $image->move(public_path('images'), $imageName);

//     $variation = new Variation();
//     $variation->name = $request->input('nomvariation');
//     $variation->prix = $request->input('prix');
//     $variation->quantity_stock = $request->input('quantité_en_stock');
//     $variation->variation_image = $imageName;
//     $variation->product_id = $request->input('id_produit');
//     $variation->save();

//     foreach ($request->input('attributes') as $attribute) {
//         DB::table('valeurattribue')->insert([
//             'attribut_id' => $attribute['id_attribute'],
//             'variation_id' => $variation->id,
//             'valeur' => $attribute['valeur'],
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);
//     }

//     return redirect('/Valeur-Attribute')->with('success', 'La valeur d\'attribut a bien été modifiée avec succès !');
// }
public function store(Request $request)
{
    request()->validate([
        'nomvariation'=>'required|min:2|max:240',
        'prix'=>'required|numeric',
        'quantité_en_stock'=>'required|integer',
        'id_produit'=>'exists:products,id',
        'image_variation' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',       
    ]);

    $image = $request->file('image_variation');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);

    $variation = new Variation();
    $variation->name = $request->input('nomvariation');
    $variation->prix= $request->input('prix');
    $variation->quantity_stock= $request->input('quantité_en_stock');
    $variation->variation_image = $imageName;

    $product = Product::find($request->input('id_produit'));
    if ($product) {
        $variation->product_id = $product->id;
    } else {
        // Gérer le cas où le produit n'existe pas
    }
    $variation->save();
    

   // Récupérer la catégorie associée au produit
   $category = $product->category;

   // Initialiser $categoryAttributes à une valeur par défaut
   $categoryAttributes = [];

   // Vérifier si la catégorie existe avant de récupérer ses attributs
   if ($category) {
       // Récupérer les attributs de la catégorie
       $categoryAttributes = $category->attributes;
     
   }
   $products = Product::all();
     // Vérifier si $categoryAttributes n'est pas rempli
     if ($categoryAttributes->isEmpty()) {
        return redirect('/index4')->with('error', 'La variation est ajouté .Vous devez associer des attributs au catégorie pour ajouter les valeurs des attributs de cette variation.');
    }
  // Déclencher l'événement
  event(new VariationAdded($variation));

   return redirect('/ajouter-ValeurAttribute-form')->with(['variation' => $variation, 'categoryAttributes' => $categoryAttributes]);

}

// public function fetchCategoryAttributes(Request $request)
// {
//     $product = Product::find($request->product_id);
//     $attributes = [];
//     $valeurAttributes = [];

//     if ($product && $product->category) {
//         $attributes = $product->category->attributes;
//         $valeurAttributes = DB::table('valeurattribue')
//             ->where('variation_id', $request->variation_id)
//             ->get();
//     }

//     return response()->json(['attributes' => $attributes,'valeurAttributes' => $valeurAttributes]);
// }
public function modifier_variation_traitement(Request $request)
{
    //dd($request->all());
    $request->validate([
        'nomvariation' => 'required|min:2|max:240',
        'prix' => 'required|numeric',
        'quantité_en_stock' => 'required|integer',
        'id_produit' => 'exists:products,id',
        'image_variation' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $variation = Variation::find($request->id);
    $variation->name = $request->nomvariation;
    $variation->prix = $request->prix;
    $variation->quantity_stock = $request->quantité_en_stock;
    $variation->product_id = $request->id_produit;

    if ($request->hasFile('image_variation')) {
        if ($variation->variation_image) {
            $oldImagePath = public_path('images/' . $variation->variation_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $imagePath = $request->file('image_variation')->move(public_path('images'), $request->file('image_variation')->getClientOriginalName());
        $variation->variation_image = $request->file('image_variation')->getClientOriginalName();
    }
    $product = Product::find($request->input('id_produit'));
     
    $variation->save();

    // foreach ($request->attributes as $attributeId => $attributeData) {
    //     DB::table('valeurattribue')->updateOrInsert(
    //         ['attribut_id' => $attributeId, 'variation_id' => $variation->id],
    //         ['valeur' => $attributeData['valeur'], 'updated_at' => now()]
    //     );
    // }
    //dd($request->attributes);
    // foreach ($request->attributes as $attributeId => $attributeData) {
    //     DB::table('valeurattribue')->updateOrInsert(
    //         ['attribut_id' => $attributeId, 'variation_id' => $variation->id],
    //         ['valeur' => $attributeData['valeur'], 'updated_at' => now()]
    //     );
    // }
    // if ($request->has('attributes')) {
    //     foreach ($request->attributes as $attributeId => $attributeData) {
    //         DB::table('valeurattribue')->updateOrInsert(
    //             ['attribut_id' => $attributeId, 'variation_id' => $variation->id],
    //             ['valeur' => $attributeData['valeur'], 'updated_at' => now()]
    //         );
    //     }
    // }
    // if ($request->has('attributes')) {
    //     foreach ($request->attributes as $attributeId => $attributeData) {
    //         ValeurAttribute::updateOrCreate(
    //             [
    //                 'attribut_id' => $attributeId,
    //                 'variation_id' => $variation->id
    //             ],
    //             [
    //                 'valeur' => $attributeData['valeur'],
    //                 'updated_at' => now()
    //             ]
    //         );
    //     }
    // }
    //  if ($request->has('attributes')) {
    //     foreach ($request->attributes as $attributeId => $attributeData) {
    //         DB::table('valeurattribue')->updateOrInsert(
    //             ['attribut_id' => $attributeId, 
    //             'variation_id' => $variation->id
    //             ],
    //             ['valeur' => $attributeData['valeur'],
    //              'updated_at' => now()
    //             ]
    //         );
    //     }
    // }
    // if ($request->has('attributes')) {
    //     foreach ($request->attributes as $attributeId => $attributeData) {
    //         $affected = DB::table('valeurattribue')->updateOrInsert(
    //             [
    //                 'attribut_id' => $attributeId,
    //                 'variation_id' => $variation->id
    //             ],
    //             [
    //                 'valeur' => $attributeData['valeur'],
    //                 'updated_at' => now()
    //             ]
    //         );
    //         // Debugging output
    //         if ($affected) {
    //             logger("Updated attribute ID {$attributeId} for variation ID {$variation->id}");
    //         } else {
    //             logger("Failed to update attribute ID {$attributeId} for variation ID {$variation->id}");
    //         }
    //     }
    // }
       // Récupérer la catégorie associée au produit
   $category = $product->category;

   // Initialiser $categoryAttributes à une valeur par défaut
   $categoryAttributes = [];

   // Vérifier si la catégorie existe avant de récupérer ses attributs
   if ($category) {
       // Récupérer les attributs de la catégorie
       $categoryAttributes = $category->attributes;
     
   }
   $products = Product::all();
     // Vérifier si $categoryAttributes n'est pas rempli
     if ($categoryAttributes->isEmpty()) {
        return redirect('/index4')->with('error', 'Vous devez ajouter des attributs pour la catégorie pour ajouter les valeurs.');
    }
    $valeurAttributes = [];

    if ($variation->product && $variation->product->category) {
        $categoryAttributes = $variation->product->category->attributes;
        $valeurAttributes = DB::table('valeurattribue')
            ->where('variation_id', $variation->id)
            ->get();
    }

    return redirect('/modifier-ValeurAttribute-form')->with(['variation' => $variation, 'categoryAttributes' => $categoryAttributes, 'valeurAttributes'=>$valeurAttributes]);
}





}
