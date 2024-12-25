<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;

class ProfilUserController extends Controller
{
  public function detail_compte_client()
  {
    return view('client-views.compte-client.detail-compte-client');
  }




  public function modifier_info_client(Request $request)
  {
    $request->validate([
        'nom_utilisateur'=>'required|string|max:255',
        'adresse_email'=>'required|email|unique:users,email,'.$request->id,
        'image_utilisateur' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    $user = User::find($request->id);
    $user->name = $request->nom_utilisateur;
    $user->email= $request->adresse_email;
    if ($request->hasFile('image_utilisateur')) {
      // Supprimer l'ancienne image si elle existe
      if ($user->image) {
          // Supprimer l'ancienne image du dossier public/images
          $oldImagePath = public_path('images/' . $user->image);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
      }
      // Enregistrer la nouvelle image avec son nom original
  $imagePath = $request->file('image_utilisateur')->move(public_path('images'), $request->file('image_utilisateur')->getClientOriginalName());
  $user->image = $request->file('image_utilisateur')->getClientOriginalName();
    $user->update();
     
     return redirect()->route('ProfilUser')->with('success-details', 'L\'utilisateur a été modifié avec succès ');
  }
}
  public function changer_motDePasse_Client(Request $request)
  {
    $request->validate([
        //'motdepasse_actuel' => 'required',
        'motdepasse_actuel' => ['required', function ($attribute, $value, $fail) {
            if (!Hash::check($value, auth()->user()->password)) {
                $fail('Le mot de passe actuel est incorrect.');
            }
        }],
        'nouveau_motdepasse' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Vérifier si le mot de passe actuel est correct
    // if (!Hash::check($request->motdepasse_actuel, $user->password)) {
    //     return back()->withErrors(['motdepasse_actuel' => 'Le mot de passe actuel est incorrect.']);
    // }
    $user = auth()->user();
    // Mettre à jour le mot de passe
    $user->password = Hash::make($request->nouveau_motdepasse);
    $user->save();

    return redirect()->back()->with('success-motdepasse', 'Le mot de passe a été mis à jour avec succès.');

  }
  public function afficher_profil_client()
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

    return view('client-views.ProfilUser',compact('categories'));
  }
}
