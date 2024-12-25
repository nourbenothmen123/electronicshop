<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\redirect;

use Illuminate\Http\Request;
use App\Models\ValeurAttribute;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class ValeurAttributeController extends Controller
{
    public function afficher(Request $request)
    {
        $searchVariation = $request->input('searchVariation');
        $searchAttribute = $request->input('searchAttribute'); 
    
        $query = ValeurAttribute::query();
    
        if ($searchVariation) {
            $query->whereHas('variation', function ($q) use ($searchVariation) {
                $q->where('name', 'like', '%' . $searchVariation . '%');
            });
        }
    
        if ($searchAttribute) {
            $query->whereHas('attribute', function ($q) use ($searchAttribute) {
                $q->where('name', 'like', '%' . $searchAttribute . '%');
            });
        }
    
        //$valeurAttributes = $query->get();
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $valeurAttributes = $query->paginate($entries);
        } else {
            $valeurAttributes = $query->get();
        }

        $totalEntries = $query->count();
        return view('Valeur-Attribute', [
            'valeurAttributes' => $valeurAttributes,
            'searchVariation' => $searchVariation,
            'searchAttribute' => $searchAttribute,
            'totalEntries' => $totalEntries,
        ]);
    }
    // public function store(Request $request)
    // {
    //     // $request->validate([
    //     //     'id_variation'=>'exists:variations,id',
    //     //     'id_attribute'=>'exists:attributes,id',
    //     //     'valeur' =>'required',
            
    //     // ]);
    //     // // Traitement de la sauvegarde des données
    //     // $valeurAttribute = new ValeurAttribute();
    //     // $valeurAttribute->valeur = $request->input('valeur');
    //     // $valeurAttribute->variation_id = $request->input('id_variation');
    //     // $valeurAttribute->attribut_id = $request->input('id_attribute');
    //     // $valeurAttribute->save();
    //     $request->validate([
    //         'attributes.*.id_variation' => 'exists:variations,id',
    //         'attributes.*.id_attribute' => 'exists:attributes,id',
    //         'attributes.*.valeur' => 'required',
    //     ]);
    
    //     // Traitement de la sauvegarde des données
    //     foreach ($request->input('attributes') as $attribute) {
    //         $valeurAttribute = new ValeurAttribute();
    //         $valeurAttribute->valeur = $attribute['valeur'];
    //         $valeurAttribute->variation_id = $attribute['id_variation'];
    //         $valeurAttribute->attribut_id = $attribute['id_attribute'];
    //         $valeurAttribute->save();
    //     }
    //     $valeurAttributes=ValeurAttribute::all();
    //     $variations=Variation::all();

    //     return redirect('/index4')->with(['success'=>'La variation est ajouté avec succée !','variations'=>$variations]);

    // }
    public function store(Request $request)
    {
        // Récupérer l'ID du produit depuis la requête
    // $productId = $request->input('product_id');
    // dump($productId);
    //  // Récupérer le produit
    // //  $product = Product::find($productId);
    // $product = Product::find($productId);
    // if (!$product) {
    //     return redirect()->back()->withErrors(['product_id' => 'Produit non trouvé.'])->withInput();
    // }

    // // Récupérer la catégorie associée au produit
    // $category = $product->category;
    // if (!$category) {
    //     return redirect()->back()->withErrors(['product_id' => 'Catégorie non trouvée pour ce produit.'])->withInput()->with('categoryAttributes', $categoryAttributes);
    // }
    // // $category = $product->category;
    //  // Récupérer les attributs de la catégorie
    //  $categoryAttributes = $category->attributes;
    // Récupérer l'ID du produit depuis la requête
    $variationId = $request->input('variation_id');
    $productId = $request->input('product_id');
    
    // Vérifier si le produit existe
    $product = Product::find($productId);
    $variation = Variation::find($variationId);
  

    // Récupérer la catégorie associée au produit
    $category = $product->category;
 
    // Récupérer les attributs de la catégorie
    $categoryAttributes = $category->attributes;
        
        
        $attributes = $request->input('attributes', []);
        $validationRules = [];
        $messages = [];
    
        foreach ($attributes as $key => $attribute) {
            $attributeId = $attribute['id_attribute'];
            $attributeName = Attribute::find($attributeId)->name; 
            $attributeType = Attribute::find($attributeId)->type;
    
            $validationRules["attributes.$key.id_variation"] = 'exists:variations,id';
            $validationRules["attributes.$key.id_attribute"] = 'exists:attributes,id';
            
            if ($attributeType === 'Chaine de caractére') {
                $validationRules["attributes.$key.valeur"] = 'required|string';
            } elseif ($attributeType === 'Entier') {
                $validationRules["attributes.$key.valeur"] = 'required|integer';
            }
            
            $messages["attributes.$key.valeur.required"] = "Le champ valeur est requis pour $attributeName";
            $messages["attributes.$key.valeur.string"] = "Le champ valeur doit être une chaîne de caractéres pour $attributeName";
            $messages["attributes.$key.valeur.integer"] = "Le champ valeur doit être un entier pour $attributeName";
        }
    
        $validator = Validator::make($request->all(), $validationRules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'categoryAttributes' => $categoryAttributes,
                'variation' => $variation
            ]);
        }
    
        // Traitement de la sauvegarde des données
        foreach ($attributes as $attribute) {
            $valeurAttribute = new ValeurAttribute();
            $valeurAttribute->valeur = $attribute['valeur'];
            $valeurAttribute->variation_id = $attribute['id_variation'];
            $valeurAttribute->attribut_id = $attribute['id_attribute'];
            $valeurAttribute->save();
        }
    
        $valeurAttributes = ValeurAttribute::all();
        $variations = Variation::all();
    
        return redirect('/index4')->with(['success' => 'La variation est ajoutée avec succès !', 'variations' => $variations]);
    }



    public function ajouter_valeur_attribut()
    {
        $variations=Variation::all();
        $attributes=Attribute::all();
        return view('forms.ajouter-valeur-attribut-variation-form');
    }
    public function destroy($id)
{
    $valeurAttribute=ValeurAttribute::where('id',$id)->firstOrFail();

    $valeurAttribute->delete();
    $valeurAttributes = ValeurAttribute::all();
    $searchVariation = session('searchVariation');
    $searchAttribute=session('searchAttribute');
    $query = ValeurAttribute::query();
    $totalEntries = $query->count();
    return view('Valeur-Attribute',['valeurAttributes'=>$valeurAttributes,'searchVariation'=>$searchVariation,'searchAttribute'=>$searchAttribute,'totalEntries'=>$totalEntries])->with('success','la variation est supprimée avec succée !');
}
//liste des valeurs 
public function modifier_ValeurAttribute($id){
    $valeurAttribute=ValeurAttribute::find($id);
    $attribute = $valeurAttribute->attribute;
    $variation = $valeurAttribute->variation;
    $product = $variation->product; //pour récupérer le produit
    $category = $product->category; //pour récupérer la catégorie
    $categoryAttributes = $product->category->attributes;

    return view ('forms.modifier-valeur-attribute-form',compact('valeurAttribute','product','variation','categoryAttributes'));

}
// public function afficher_formulaire()
// {
//     return view('forms.ajouter-valeur-attribute-form');
// }
public function modifier_ValeurAttribute_traitement(Request $request)
{
    $request->validate([
        'id_variation'=>'exists:variations,id',
        'id_attribute'=>'exists:attributes,id',
    ]);
   
    $valeurAttribute = ValeurAttribute::find($request->id);
    $valeurAttribute->valeur = $request->input('valeur');
    $valeurAttribute->variation_id = $request->input('id_variation');
    $valeurAttribute->update();
    return redirect('/Valeur-Attribute')->with('success','La valeur d attribut a bien été modifiée avec succés !');
}
public function modifier_ValeurAttributeVariation(Request $request)
{
    // Valider les entrées
    $request->validate([
        'attributes' => 'required|array',
        'attributes.*.id_attribute' => 'required|exists:attributes,id',
        'attributes.*.id_variation' => 'required|exists:variations,id',
        'attributes.*.valeur' => 'required|string|max:255',
    ]);
    //dd($request->input('attributes'));

    // Parcourir chaque attribut envoyé dans la requête
    foreach ($request->input('attributes') as $attribute) {
        // Rechercher l'entrée existante dans la table valeurattribue
        $valeurAttribute = DB::table('valeurattribue')
            ->where('attribut_id', $attribute['id_attribute'])
            ->where('variation_id', $attribute['id_variation'])
            ->first();

        if ($valeurAttribute) {
            // Mettre à jour l'entrée existante
            DB::table('valeurattribue')
                ->where('id', $valeurAttribute->id)
                ->update(['valeur' => $attribute['valeur']]);
        } else {
            // Créer une nouvelle entrée si elle n'existe pas
            DB::table('valeurattribue')->insert([
                'attribut_id' => $attribute['id_attribute'],
                'variation_id' => $attribute['id_variation'],
                'valeur' => $attribute['valeur'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    // foreach ($request->input('attributes') as $attribute) {
    //     $valeurAttribute = new ValeurAttribute();
    //     $valeurAttribute->valeur = $attribute['valeur'];
    //     $valeurAttribute->variation_id = $attribute['id_variation'];
    //     $valeurAttribute->attribut_id = $attribute['id_attribute'];
    //     $valeurAttribute->save();
    // }
    return redirect('/Valeur-Attribute')->with('success','La valeur d attribut a bien été modifiée avec succés !');
}

   
}
