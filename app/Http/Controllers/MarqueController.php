<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque;
use Storage;

class MarqueController extends Controller
{
    public function afficher_liste_marques(Request $request){
        
        $marques = Marque::query();

        if(request()->has('chercherMarque'))
        {
            $marques = $marques->where('name','like','%'.request()->get('chercherMarque').'%');
        }

        // Déterminer le nombre d'entrées à afficher
        $entries = request()->get('entries', 'all');
        if ($entries !== 'all') {
            $marques = $marques->paginate($entries);
        } else {
            $marques = $marques->get();
    
        }
        $totalMarques = $marques->count();
        
        return view('marques.MarqueIndex',compact('marques','totalMarques'));
    }
    public function afficher_form_ajout_marque()
    {
        return view('marques.ajouter-marque-form');
    }
    public function store(Request $request)
    {
        request()->validate([
            'nom_marque'=>'required|max:50',
            'image_marque' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('image_marque');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);
        $marque = new Marque();
        $marque->name = $request->input('nom_marque');
        $marque->image = $imageName;
        $marque->save();
        $marques = Marque::all();
        return redirect('/marques')->with(['marques' => $marques,'success' => 'La nouvelle marque est ajoutée avec succès!']);        
    }
    public function modifier_marque($id)
    {
        $marque=Marque::find($id);
    return view ('marques.modifier-marque-form',compact('marque'));

    }
    // public function modifier_marque_traitement(Request $request){
    // $request->validate([
    //     'nom_marque' => 'required|string|max:255',
    //     'image_marque' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Vérifier si l'image est valide
    // ]);

    // // Récupérer la marque à modifier
    // $marque = Marque::findOrFail($request->id);

    // // Mettre à jour le nom de la marque
    // $marque->name = $request->input('nom_marque');

    // // Vérifier si une nouvelle image a été téléchargée
    // if ($request->hasFile('image_marque')) {
    //     // Supprimer l'ancienne image si elle existe
    //     if ($marque->image) {
    //         Storage::delete('public/images/' . $marque->image);
    //     }

    //     // Enregistrer la nouvelle image
    //     $imagePath = $request->file('image_marque')->store('public/images');
    //     $marque->image = basename($imagePath);
    // }
    // // if ($request->hasFile('image_marque')) {
    // //     $image = file_get_contents($request->file('image_marque')->getRealPath());
    // //     $marque->image = $image;
    // // }

    // // Sauvegarder les modifications
    // $marque->save();

    // // Rediriger avec un message de succès
    // return redirect()->route('marques')->with('success', 'Marque modifiée avec succès');

    // }
//     public function modifier_marque_traitement(Request $request)
// {
//     $request->validate([
//         'nom_marque' => 'required|string|max:255',
//         'image_marque' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Vérifier si l'image est valide
//     ]);

//     // Récupérer la marque à modifier
//     $marque = Marque::findOrFail($request->id);

//     // Mettre à jour le nom de la marque
//     $marque->name = $request->input('nom_marque');

//     // Vérifier si une nouvelle image a été téléchargée
//     if ($request->hasFile('image_marque')) {
//         // Supprimer l'ancienne image si elle existe
//         if ($marque->image) {
//             // Supprimer l'ancienne image du dossier public/images
//             $oldImagePath = public_path('images/' . $marque->image);
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         // Enregistrer la nouvelle image
//         $imagePath = $request->file('image_marque')->move(public_path('images'));
//         $marque->image = $request->file('image_marque')->getClientOriginalName();
//     }

//     // Sauvegarder les modifications
//     $marque->save();

//     // Rediriger avec un message de succès
//     return redirect()->route('marques')->with('success', 'Marque modifiée avec succès');
// }
public function modifier_marque_traitement(Request $request)
{
    $request->validate([
        'nom_marque' => 'required|string|max:255',
        'image_marque' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Vérifier si l'image est valide
    ]);

    // Récupérer la marque à modifier
    $marque = Marque::findOrFail($request->id);

    // Mettre à jour le nom de la marque
    $marque->name = $request->input('nom_marque');

    // Vérifier si une nouvelle image a été téléchargée
    if ($request->hasFile('image_marque')) {
        // Supprimer l'ancienne image si elle existe
        if ($marque->image) {
            // Supprimer l'ancienne image du dossier public/images
            $oldImagePath = public_path('images/' . $marque->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Enregistrer la nouvelle image avec son nom original
        $imagePath = $request->file('image_marque')->move(public_path('images'), $request->file('image_marque')->getClientOriginalName());
        $marque->image = $request->file('image_marque')->getClientOriginalName();
    }

    // Sauvegarder les modifications
    $marque->save();

    // Rediriger avec un message de succès
    return redirect()->route('marques')->with('success', 'Marque modifiée avec succès');
}


    public function destroy($id)
    {
        $marque=Marque::where('id',$id)->firstOrFail();
        $marque->delete();
        $marques = Marque::all();
        $totalMarques = $marques->count();
        return redirect('/marques')->with(['marques'=>$marques,'totalMarques'=>$totalMarques,'success'=>'la marque est supprimé avec succée !']);
    }
}
