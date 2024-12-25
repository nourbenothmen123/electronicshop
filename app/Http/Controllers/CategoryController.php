<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;


class CategoryController extends Controller
{

     // public function __construct()
    // {
    //     $this->middleware('permission:supprimer rôle',['only'=>['destroy']]);
    //     $this->middleware('permission:modifier rôle',['only'=>['update','edit']]);
    //     $this->middleware('permission:ajouter rôle',['only'=>['create','store']]);
    //     $this->middleware('permission:afficher la liste des rôles',['only'=>['index']]);
    //     $this->middleware('permission:ajouter / modifier rôle permission',['only'=>['addPermissionToRole','givePermissionToRole']]);
    // }
    public function afficher()
    {
        $categories = Category::query();

        if(request()->has('search'))
        {
            $categories = $categories->where('name','like','%'.request()->get('search').'%');
        }
    
        $entries = request()->get('entries', 'all');

        
        
        if ($entries !== 'all') {
            $categories = $categories->paginate($entries);
        } else {
            $categories = $categories->get();
        }
        $totalEntries = $categories->count();
        return view('index2',compact('categories','totalEntries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomcategorie' => 'required|min:2|max:240',
            'description' => 'required|min:8|max:240',
            'parent_Id' => 'nullable|exists:categories,id',
            'image_categorie' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $category_image = $request->file('image_categorie');
        $NomImage = time() . '_' . $category_image->getClientOriginalName();
        $category_image->move(public_path('images'), $NomImage);
        $category = new Category();
        $category->name = $request->input('nomcategorie');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_Id');
        $category->category_image = $NomImage;
        $category->save();
    
        $categories = Category::all();
    

        return redirect('/index2')->with(['categories' => $categories, 'success' => 'La nouvelle catégorie est ajoutée avec succès!']);        
    }
    public function liste_categorie()
    {
        $categories=Category::all();
        return view('index2',compact('categories'));
    }
    public function destroy($id)
    {
        $category=Category::where('id',$id)->firstOrFail();
         // Vérifier si la catégorie a des enfants
    // $hasChildren = Category::where('parent_id', $category->id)->exists();

    // if ($category->parent_id === null && $hasChildren) {
    //     // Catégorie parente avec des enfants, afficher un message d'erreur
    //     $categories = Category::all();
    //     $totalEntries = $categories->count();
    //     return redirect('/index2')->with(['categories'=>$categories,'totalEntries'=>$totalEntries,'error'=> 'Vous ne pouvez pas supprimer une catégorie parente. Veuillez d\'abord supprimer les catégories filles de cette catégorie.']);
    // }

        $category->delete();
        $categories = Category::all();
        $totalEntries = $categories->count();
        return redirect('/index2')->with(['categories'=>$categories,'totalEntries'=>$totalEntries,'success'=>'la categorie est supprimé avec succée !']);
    }
    public function modifier_categorie($id){
        $categories=Category::find($id);
        //$mescategories=Category::all();
        $selectedCategoryId = $categories->parent_id;
        $mescategories = Category::whereNotIn('id', [$id])->get();
        return view ('forms.modifierCategorie',compact('categories','mescategories','selectedCategoryId'));

    }

    public function modifier_categorie_traitement(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'nomcategorie' => 'required|min:2|max:240',
            'description' => 'required|min:8|max:240',
            'parent_Id' => 'nullable|exists:categories,id',
            'image_categorie' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Récupération de la catégorie à modifier
        $category = Category::find($request->id);

        // Mise à jour des propriétés de la catégorie
        $category->name = $request->input('nomcategorie');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_Id');
        if ($request->hasFile('image_categorie')) {
            // Supprimer l'ancienne image si elle existe
            if ($category->category_image) {
                // Supprimer l'ancienne image du dossier public/images
                $oldImagePath = public_path('images/' . $category->category_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
                    // Enregistrer la nouvelle image avec son nom original
        $imagePath = $request->file('image_categorie')->move(public_path('images'), $request->file('image_categorie')->getClientOriginalName());
        $category->category_image = $request->file('image_categorie')->getClientOriginalName();
        }

        $category->update();
    
        // Redirection avec un message de succès
        return redirect('index2')->with('success', 'La catégorie a bien été modifiée avec succès !');
    }
    
 
    //select pour l'ajout d'un nouveau catégorie
    public function select()
    {
        $categories = Category::all();
        return view('forms.categorie-form', ['categories' => $categories]);

    }
    // public function importCategories(Request $request)
    // {
    //     Artisan::call('import:categories', [
    //         'url' => 'http://localhost:8001/api/categories'
    // ]);
    // return response()->json(['message' => 'Importation des catégories lancée.']);
    // }
    public function importCategories()
    {
        $url = 'http://localhost:8001/api/categories';
        $exitCode = Artisan::call('import:categories', [
            'url' => $url,
        ]);

        if ($exitCode === 0) {
            return redirect()->back()->with('success', 'Categories imported successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to import categories.');
        }
    }
}

