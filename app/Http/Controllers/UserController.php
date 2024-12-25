<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;


class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:supprimer utilisateur',['only'=>['destroy']]);
    //     $this->middleware('permission:modifier utilisateur',['only'=>['modifier_user','modifier_user_traitement']]);
    //     $this->middleware('permission:ajouter utilisateur',['only'=>['select','store']]);
    //     $this->middleware('permission:afficher la liste des utilisateurs',['only'=>['afficher','search']]);
    //     //$this->middleware('permission:ajouter / modifier rôle permission',['only'=>['addPermissionToRole','givePermissionToRole']]);
    // }
    public function afficher(Request $request)
    {
        // Vérifier si un utilisateur est connecté
        if(Auth::check()) {
            // Récupérer tous les utilisateurs
            $users = User::query();
            if(request()->has('search'))
        {
            $users = $users->where('name','like','%'.request()->get('search').'%');
        }
    
            // Exécuter la requête pour récupérer les utilisateurs
            $users = $users->get();
            
            // Retourner une vue avec les utilisateurs
            return view('user', ['users' => $users]);

        } else {
            // Rediriger vers la page de connexion si aucun utilisateur n'est connecté
            return redirect()->route('login');
        }
    }
    
    public function search(){

        $searchTerm = $request->input('search');

        $users = User::where('name', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('user', compact('user'));
    }
    public function store(Request $request)
    {
       
            $validatedData=$request->validate([
                'nomutulisateur' => 'required|string|max:255',
                'emailutulisateur' => 'required|email|unique:users,email',
                'mtputulisateur' => 'required|string|min:8',
                'roles' =>'required|array'  
            ]);
          
            $user = new User();
            $user->name = $validatedData['nomutulisateur'];
            $user->email= $validatedData['emailutulisateur'];
            $user->password= bcrypt($validatedData['mtputulisateur']);
            $user->image_user ='user.jpeg';
            
            $user->syncRoles($validatedData['roles']);
            // if (array_key_exists('roles', $validatedData)) {
            //     $roles = $validatedData['roles'];
            // } else {
            //     $roles = []; // Définir une valeur par défaut si la clé 'roles' n'existe pas
            // }
            
            $user->save();
            $users = User::all();
    
            return redirect('/user')->with(['users' => $users,'success' => 'Le nouveau utilisateur est ajoutée avec succès!']); 
    }
      

    public function select()
    {
        $users = User::all();
        $roles=Role::pluck('name','name')->all();
        return view('forms.ajouter-user-form', ['users' => $users,'roles' => $roles]);

    }
    public function destroy($id)
{
    $user=User::where('id',$id)->firstOrFail();

    $user->delete();
    $users = User::all();
    return redirect('/user')->with(['users'=>$users,'success'=>'l utilisateur est supprimée avec succée !']);
}
public function modifier_user($id){
    $roles=Role::pluck('name','name')->all();
    $users=User::find($id);
    $usersRoles=$users->roles->pluck('name','name')->all();
    return view ('forms.modifier-user-form',compact('users','roles','usersRoles'));

}
public function modifier_user_traitement(Request $request)
{
     // Validation des données entrées par l'utilisateur
     $validatedData =$request->validate([
        'nomutulisateur' => 'required|string|max:255',
        'emailutulisateur' => 'required|email|unique:users,email,'.$request->id,
        //'mtputulisateur' => 'nullable|string|min:8',
        'roles'=>'required|array'
    ]);

    // Récupération de l'utilisateur à modifier
    $user = User::findOrFail($request->id);

    // Mise à jour des données de l'utilisateur
    $user->name = $validatedData['nomutulisateur'];
    $user->email = $validatedData['emailutulisateur'];
    // if ($request->filled('mtputulisateur')) {
    //     $user->password = bcrypt($validatedData['mtputulisateur']);
    // }

    // Sauvegarde des modifications
    $user->update();
    // All current roles will be removed from the user and replaced by the array given
    $user->syncRoles($validatedData['roles']);

    // Redirection vers la page de liste des utilisateurs avec un message de succès
    return redirect()->route('user')->with('success', 'L utilisateur a été modifié avec succès!');
    
}
public function modifier_profil_utilisateur($id)
{
    $user=User::find($id);
    return view ('forms.modifier-profil-user-form',compact('user'));
}
public function modifier_profil_utilisateur_traitement(Request $request)
{
  
    $request->validate([
        'nom_utilisateur'=>'required|string|max:255',
        'adresse_email'=>'required|email|unique:users,email,'.$request->id,
        //'mot_de_passe'=>'required|string|min:8',
        'image_utilisateur' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
    ]);
    // $image = $request->file('image_utilisateur');
    // $imageName = time() . '_' . $image->getClientOriginalName();
    // $image->move(public_path('images'), $imageName); 
    $user = User::find($request->id);
    $user->name = $request->nom_utilisateur;
    $user->email= $request->adresse_email;
    if ($request->hasFile('image_utilisateur')) {
                // Enregistrer la nouvelle image avec son nom original
    $imagePath = $request->file('image_utilisateur')->move(public_path('images'), $request->file('image_utilisateur')->getClientOriginalName());
    $user->image_user = $request->file('image_utilisateur')->getClientOriginalName();
    }
    // $user->image_user = $imageName;
    $user->update();
    return redirect()->route('user')->with('success', 'L\'utilisateur a été modifié avec succès!');
}
public function modifier_motdepasse_traitement(Request $request)
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
}
