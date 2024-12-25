<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomattribute' => 'required|min:2|max:240',
            'type_attribute' => 'required',
            'multiselect4' => 'required|array', // Validation pour les catégories sélectionnées
        ]);
        
        
    
        $attribut = new Attribute();
        $attribut->name = $validatedData['nomattribute'];

        $attribut->type = $validatedData['type_attribute'];
        $attribut->save();
        //dump($validatedData['multiselect4']);
        // Associer l'attribut aux catégories sélectionnées
    foreach ($validatedData['multiselect4'] as $categoryId) {
        DB::table('attributcategorie')->insert([
            'attribut_id' => $attribut->id,
            'categorie_id' => $categoryId,
        ]);
    }
        $attributes = Attribute::all();
       

        return redirect('/index3')->with(['attributes' => $attributes,'success' => 'Le nouveau attribut est ajouté avec succès!']); 
}
public function afficher(){
        
    $attributes = Attribute::query();

    if(request()->has('search'))
    {
        $attributes = $attributes->where('name','like','%'.request()->get('search').'%');
    }

    
    $entries = request()->get('entries', 'all');

        
        
    if ($entries !== 'all') {
        $attributes = $attributes->paginate($entries);
    } else {
        $attributes = $attributes->get();
    }
    $totalEntries = $attributes->count();
    return view('index3',compact('attributes','totalEntries'));
}
public function destroy($id)
{
    $attribute=Attribute::where('id',$id)->firstOrFail();

    $attribute->delete();
    $attributes = Attribute::all();
    $totalEntries = $attributes->count();
    return view('/index3',compact('attributes','totalEntries'))->with('success','l\attribut est supprimée avec succée !');
}

public function modifier_attribute($id){
    $attributes=Attribute::find($id);
    $categories = Category::all();
    return view ('forms.modifier-attribute-form',compact('attributes','categories'));

}
// public function modifier_attribute_traitement(Request $request)
// {
//     $validatedData = $request->validate([
//         'nomattribute' => 'required|min:2|max:240',
//         'type_attribute' => 'required',
//         'multiselect4' => 'required|array', // Validation pour les catégories sélectionnées
//     ]);
//     $attribute = Attribute::find($request->id);
//     $attribute->name = $validatedData['nomattribute'];
//     $attribute->type = $validatedData['type_attribute'];
//     foreach ($validatedData['multiselect4'] as $categoryId) {
//         DB::table('attributcategorie')->insert([
//             'attribut_id' => $attribut->id,
//             'categorie_id' => $categoryId,
//         ]);
//     }
//     $attribute->update();
//     return redirect('/index3')->with('success','L\attribute a bien été modifiée avec succés !');
// }
public function modifier_attribute_traitement(Request $request)
{
    $validatedData = $request->validate([
        'nomattribute' => 'required|min:2|max:240',
        'type_attribute' => 'required',
        'multiselect4' => 'required|array', // Validation pour les catégories sélectionnées
    ]);

    $attribute = Attribute::find($request->id);

    if (!$attribute) {
        return redirect('/index3')->with('error', 'L\'attribut n\'existe pas.');
    }
    $attribute->name = $validatedData['nomattribute'];
    $attribute->type = $validatedData['type_attribute'];
    $attribute->save();

    // Supprimer les anciennes associations
    DB::table('attributcategorie')->where('attribut_id', $attribute->id)->delete();

    // Réinsérer les nouvelles associations
    foreach ($validatedData['multiselect4'] as $categoryId) {
        DB::table('attributcategorie')->insert([
            'attribut_id' => $attribute->id,
            'categorie_id' => $categoryId,
        ]);
    }

    return redirect('/index3')->with('success', "cet attribut a bien été modifié avec succès !");
}

public function selectionner_categories()
{
    $categories = Category::all();
    return view('forms.ajouter-attribute-form',compact('categories'));
}
}