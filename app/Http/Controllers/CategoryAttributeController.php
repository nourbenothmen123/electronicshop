<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryAttribute;
use App\Models\Category;
use App\Models\Attribute;

class CategoryAttributeController extends Controller
{
 
    public function afficher(Request $request)
    {
        $searchCategory = $request->input('searchCategory'); // Nom de la catégorie recherchée
        $searchAttribute = $request->input('searchAttribute'); // Nom de l'attribut recherché
    
        $query = CategoryAttribute::query();
    
        if ($searchCategory) {
            $query->whereHas('category', function ($q) use ($searchCategory) {
                $q->where('name', 'like', '%' . $searchCategory . '%');
            });
        }
    
        if ($searchAttribute) {
            $query->whereHas('attribute', function ($q) use ($searchAttribute) {
                $q->where('name', 'like', '%' . $searchAttribute . '%');
            });
        }
    
        //$categoryAttributes = $query->get();
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $categoryAttributes = $query->paginate($entries);
        } else {
            $categoryAttributes = $query->get();
        }
        $totalEntries = $query->count();
    
        return view('Categorie-Attribute', [
            'categoryAttributes' => $categoryAttributes,
            'searchCategory' => $searchCategory,
            'searchAttribute' => $searchAttribute,
            'totalEntries' => $totalEntries,
        ]);
    }
 
    

    public function store(Request $request)
    {
        $category = Category::find($request->input('nom_categorie'));
        $attribute = Attribute::find($request->input('nom_attribute'));

        if ($category && $attribute) {
            $categoryAttribute = new CategoryAttribute();
            $categoryAttribute->categorie_id = $category->id;
            $categoryAttribute->attribut_id = $attribute->id;
            $categoryAttribute->save();

            return redirect('/Categorie-Attribute')->with(['success' => 'L attribut est affecté au catégorie avec succées !']);
        } else {
            return redirect('/Categorie-Attribute')->with(['error' => 'Erreur lors de l affectation de l attribut au catégorie']);
        }
    }
    public function selectionner_CategorieAttribute()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('forms.ajouter-categorie-attribute-form', ['categories' => $categories,'attributes'=>$attributes]);
    
    }
    public function destroy($id,Request $request)
{

    $searchCategory = $request->input('searchCategory'); // Nom de la catégorie recherchée
    $searchAttribute = $request->input('searchAttribute'); // Nom de l'attribut recherché

    $query = CategoryAttribute::query();

    if ($searchCategory) {
        $query->whereHas('category', function ($q) use ($searchCategory) {
            $q->where('name', 'like', '%' . $searchCategory . '%');
        });
    }

    if ($searchAttribute) {
        $query->whereHas('attribute', function ($q) use ($searchAttribute) {
            $q->where('name', 'like', '%' . $searchAttribute . '%');
        });
    } 

    $categoryAttribute=CategoryAttribute::where('id',$id)->firstOrFail();
    //$categoryAttributes = $query->get();
    $entries = request()->get('entries', 'all');
    if ($entries !== 'all') {
        $categoryAttributes = $query->paginate($entries);
    } else {
        $categoryAttributes = $query->get();
    }
    $totalEntries = $query->count();

    $categoryAttribute->delete();
    $categoryAttributes = CategoryAttribute::all();
    return view('/Categorie-Attribute',compact('categoryAttributes','searchCategory','searchAttribute','totalEntries'))->with('success','le produit est supprimé avec succée !');
}
public function modifier_CategorieAttribute($id){
    $categoryAttribute=CategoryAttribute::find($id);
    $categories = Category::all();
    $attributes = Attribute::all();
    
    return view ('forms.modifier-categorie-attribute-form',compact('categoryAttribute','categories','attributes'));

}
public function modifier_CategorieAttribute_traitement(Request $request)
{
    $request->validate([
        'id_categorie'=>'exists:categories,id', 
        'id_attribute'=>'exists:attributes,id'
    ]);
    
    $categoryAttribute = CategoryAttribute::find($request->id);
    $categoryAttribute->categorie_id = $request->id_categorie;
    $categoryAttribute->attribut_id = $request->id_attribute;
    $categoryAttribute->update();
    

    return redirect('/Categorie-Attribute')->with('success','association de lattribut au catégorie a bien été modifiée avec succés !');
}
}
