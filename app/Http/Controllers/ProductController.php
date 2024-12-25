<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Marque;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        request()->validate([
            'nomproduit'=>'required|max:240',
            'description'=>'required|max:240',
            'nom_categorie'=>'exists:categories,id',
            'image_produit' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_marque'=>'nullable|exists:marques,id'
        ]);
        $image = $request->file('image_produit');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->name = $request->input('nomproduit');
        $product->description = $request->input('description');
        $product->image = $imageName;
        $product->id_marque=$request->input('id_marque');
        $category = Category::find($request->input('nom_categorie'));
        if ($category) {
            $product->category_id = $category->id;
        } else {
            // Gérer le cas où la catégorie n'existe pas
        }
        $product->save();
        $products = Product::all();

        return redirect('/index')->with(['products' => $products,'success' => 'Le nouveau produit est ajouté avec succès!']);        
    }
    public function afficher(Request $request){
        
        
        $products = Product::query();

        if(request()->has('search'))
        {
            $products = $products->where('name','like','%'.request()->get('search').'%');
        }
    
        //$products = $products->get();
        // Déterminer le nombre d'entrées à afficher
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $products = $products->paginate($entries);
        } else {
            $products = $products->with('marque')->get(); // Utilisez ->with('marque') pour charger la relation
    
        }
        $totalEntries = $products->count();
        
    
        return view('index',compact('products','totalEntries'));
    }

    public function select()
{
    //$products = Product::with('category')->get();
    $categories = Category::all();
    $marques=Marque::all();
    return view('forms.ajouter-produit-form', ['categories' => $categories,'marques'=>$marques]);

}
public function destroy($id)
{
    $product=Product::where('id',$id)->firstOrFail();

    $product->delete();
    $products = Product::all();
    $totalEntries = $products->count();
    return redirect('/index')->with(['products'=>$products,'totalEntries'=>$totalEntries,'success'=>'le produit est supprimé avec succée !']);
}
public function modifier_produit($id){
    $product=Product::find($id);
    $mescategories=Category::all();
    $marques=Marque::all();
    return view ('forms.modifier-produit-form',compact('product','mescategories','marques'));

}
public function modifier_produit_traitement(Request $request)
{
    $request->validate([
        'nomproduit'=>'required|max:240',
        'description'=>'required|max:240',
        'nom_categorie'=>'exists:categories,id',
        'image_produit' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'id_marque'=>'nullable|exists:marques,id'

    ]);
    //$image = $request->file('image_produit');
    //$imageName = time() . '_' . $image->getClientOriginalName();
    //$image->move(public_path('images'), $imageName);
    $product = Product::find($request->id);
    $product->name = $request->nomproduit;
    $product->description = $request->description;
    $product->category_id = $request->nom_categorie;
    $product->id_marque=$request->id_marque;
      // Vérifier si une nouvelle image a été téléchargée
      if ($request->hasFile('image_produit')) {
        // Supprimer l'ancienne image si elle existe
        if ($product->image) {
            // Supprimer l'ancienne image du dossier public/images
            $oldImagePath = public_path('images/' . $product->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Enregistrer la nouvelle image avec son nom original
        $imagePath = $request->file('image_produit')->move(public_path('images'), $request->file('image_produit')->getClientOriginalName());
        $product->image = $request->file('image_produit')->getClientOriginalName();
    }

    $product->update();
    return redirect('/index')->with('success','Le produit a bien été modifié avec succés !');
}
public function afficher_produits(Request $request)
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
    //$produits=Product::all();
    $query = Product::query();

    if ($request->has('brands')) {
        $brandIds = $request->input('brands');
        $query->whereIn('id_marque', $brandIds);
    }

    if ($request->has('categories')) {
        $categoryIds = $request->input('categories');
        $query->whereIn('category_id', $categoryIds);
    }

    $produits = $query->get();
    $categoriesProduit = Category::all();
    $marques = Marque::all();

    $categoriesProduit=Category::all();
    $marques=Marque::all();
    return view('client-views.Produits.produits-banner',compact('produits','categoriesProduit','marques','categories'));
}
// public function filtrer_produits(Request $request)
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
//     $query = Product::query();

//     if ($request->has('brands')) {
//         $brandIds = $request->input('brands');
//         $query->whereIn('marque_id', $brandIds);
//     }

//     if ($request->has('categories')) {
//         $categoryIds = $request->input('categories');
//         $query->whereIn('category_id', $categoryIds);
//     }
//     $produits = $query->get();
//     $categoriesProduit = Category::all();
//     $marques = Marque::all();
//     return view('client-views.Produits.produits-banner',compact('produits','categories','categoriesProduit','marques'));
// }

}

