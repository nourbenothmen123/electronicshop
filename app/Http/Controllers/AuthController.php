<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
   public function register()
   {
      return view('authentication.register');
   }
   public function store()
   {
      $validated=request()->validate(
         [
            'name'=>'required|min:3|max:40',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed'

         ]
         );
         $user=User::create(
            [
               'name'=>$validated['name'],
               'email'=>$validated['email'],
               'password'=>Hash::make($validated['password']),
            ]
            );
            return redirect()->route('login')->with('success','Le compte est crée avec sucée !');
   }
   public function login()
   {
    
    return view ('authentication.login');
   } 
   //code pour authentifier et vérifer rôle 
//    public function authenticate()
// {
//     $validated = request()->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8'
//     ]);

//     if(auth()->attempt($validated))
//     {
//         // Vérifier si l'utilisateur a le rôle admin
//         $user = auth()->user();
//         //dd($user);
//         if ($user->hasRole('admin')) {
//          //dump($user->hasRole('admin'));
//             // L'utilisateur a le rôle admin, nettoyer la session précédente
//             request()->session()->regenerate();
//             return redirect()->route('dashboardIndex');
//         } else {
//             // L'utilisateur n'a pas le rôle admin, déconnecter et rediriger vers login
//             auth()->logout();
//             return redirect()->route('login')->withErrors([
//                 'email' => "L'utilisateur n'a pas le rôle admin."
//             ]);
//         }
//     }

//     return redirect()->route('login')->withErrors([
//         'email' => "L'utilisateur avec l'email et le mot de passe fournis n'est pas trouvé."
//     ]);
// }
//admin
   public function authenticate()
   {
      $validated=request()->validate(
         [
         'email'=>'required|email',
         'password'=>'required|min:8'
         ]
      );
      //dd($validated);
      if(auth()->attempt($validated))
      {
         //nettoyer la session précédante 
         request()->session()->regenerate();
         return redirect()->route('dashboardIndex');

      }
      return redirect()->route('login')->withErrors([
         'email'=>"l' utilisateur avec l'email et le mot de passe fournie n'est pas trouvé!! "
      ]);

   }
//    public function authenticate()
// {
//     $validated = request()->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8'
//     ]);

//     $user = User::where('email', $validated['email'])->first();

//     if (!$user) {
//         return redirect()->route('login')->withErrors([
//             'email' => "L'utilisateur avec l'email fourni n'est pas trouvé."
//         ]);
//     }

//     if (!auth()->attempt($validated)) {
//         return redirect()->route('login')->withErrors([
//             'email' => "L'utilisateur avec l'email et le mot de passe fournis n'est pas trouvé."
//         ]);
//     }

//     // Vérifier si l'utilisateur a un rôle
//     if (!$user->roles()->exists()) {
//         auth()->logout();
//         return redirect()->route('login')->withErrors([
//             'email' => "L'utilisateur n'a pas de rôle associé."
//         ]);
//     }

//     // Nettoyer la session précédente
//     request()->session()->regenerate();

//     return redirect()->route('dashboardIndex');
// }
// public function authenticate()
// {
//     $validated = request()->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8'
//     ]);

//     $user = User::where('email', $validated['email'])->first();

//     if (!$user) {
//         return redirect()->route('login')->withErrors([
//             'email' => "L'utilisateur avec l'email fourni n'est pas trouvé."
//         ]);
//     }
//         // Vérifier si l'utilisateur a un rôle
//     if (!$user->roles()->exists()) {
//         auth()->logout();
//         return redirect()->route('login')->withErrors([
//             'email' => "L'utilisateur n'a pas de rôle associé."
//         ]);
//     }

//     if (auth()->attempt($validated)) {
//         // Nettoyer la session précédente
//         request()->session()->regenerate();
//         return redirect()->route('dashboardIndex');
//     }


//     return redirect()->route('login')->withErrors([
//         'email' => "L'utilisateur avec l'email et le mot de passe fournis n'est pas trouvé."
//     ]);
// }


   public function logout()
   {
      auth()->logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect()->route('login')->with('success','se déconnecter avec succée !');
   }
   public function afficher_FormRegister()
   {
      $categoriesParentes = Category::whereNull('parent_id')->get();
      $categories = [];
      foreach ($categoriesParentes as $categorieParente) {
          $sousCategories = $categorieParente->sousCategories; // Assurez-vous que la relation sousCategories renvoie une collection
          $categories[] = [
              'categorieParente' => $categorieParente,
              'sousCategories' => $sousCategories,
          ];
      }
      return view('client-views.authentification.register',compact('categories'));

   }
   public function afficher_formLogin()
   {
      $categoriesParentes = Category::whereNull('parent_id')->get();
      $categories = [];
      foreach ($categoriesParentes as $categorieParente) {
          $sousCategories = $categorieParente->sousCategories; // Assurez-vous que la relation sousCategories renvoie une collection
          $categories[] = [
              'categorieParente' => $categorieParente,
              'sousCategories' => $sousCategories,
          ];
      }
      return view('client-views.authentification.login',compact('categories'));
   }
  public function stocker_client(Request $request)
  {
//    $validatedData = $request->validate([
//       'nom_utilisateur' => 'required|string|max:50',
//       'adresse_email' => 'required|email|unique:users,email',
//       'mot_de_passe' => 'required|confirmed|string|min:8',
//   ]);

//   $user = new User();
//   $user->name = $validatedData['nom_utilisateur'];
//   $user->email = $validatedData['adresse_email'];
//   $user->password = bcrypt($validatedData['mot_de_passe']);
//   $user->save();
//   $user->syncRoles('client');

//   return redirect()->route('LoginPage');
$validated=request()->validate(
   [
      'nom_utilisateur'=>'required|min:3|max:40',
      'adresse_email'=>'required|email|unique:users,email',
      'mot_de_passe'=>'required|confirmed'

   ]
   );
   $user=User::create(
      [
         'name'=>$validated['nom_utilisateur'],
         'email'=>$validated['adresse_email'],
         'password'=>Hash::make($validated['mot_de_passe']),
      ]
      );
      $user->syncRoles('client');

      return redirect('/client/login')->with('success','Le compte est crée avec sucée !');
   
  }
// public function login_client_traitement(Request $request)
// {
//    $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         if (Auth::user()->hasRole('client')) {
//             return redirect()->route('ProfilUser');
//         } else {
//             return redirect()->route('AccueilPage');
//         }
//     }

//     return back()->withErrors([
//         'email' => 'The provided credentials do not match our records.',
//     ]);
// }
public function login_client_traitement(Request $request)
{
    // Validation des données saisies
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    // Obtenir les informations d'identification
    $credentials = $request->only('email', 'password');

    // Vérifier les informations d'identification
    if (Auth::attempt($credentials)) {
        // Vérifier si l'utilisateur a le rôle 'client'
        if (Auth::user()->hasRole('client')) {
            // Rediriger vers le profil de l'utilisateur
            return redirect()->route('ProfilUser');
        } else {
            // Si l'utilisateur n'a pas le rôle 'client', déconnecter et rediriger vers la page d'accueil
            Auth::logout();
            return redirect()->route('AccueilPage');
        }
    }

    // Si les informations d'identification sont incorrectes, retourner en arrière avec des erreurs
    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ]);
}

public function logout_client()
{
   auth()->logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect()->route('AccueilPage');

}
public function forgot()
{
   return view('authentication.forgot');
}
public function forgot_password(Request $request)
{
   $user=User::where('email','=',$request->email)->first();
   if(!empty($user))
   {
      $user->remember_token=str::random(40);
      $user->save();
      Mail::to($user->email)->send(new ForgotPasswordMail($user));
      return redirect()->back()->with('success','Email de réinitialisation de mot de passe est envoyée avec succés consulter votre boite email pour terminer la réinitialisation de votre mot de passe');

   }
   else
   {
      return redirect()->back()->with('error',"l'email n'est pas enregistré dans le système !");

   }
}
public function reset($token)
{
   $user=User::where('remember_token',"=",$token)->first();
   if(!empty($user))
   {
   return view('authentication.reset',compact('token'));
   }
   else
   {
      abort(404);

   }
}
public function reset_traitement(Request $request)
{
   $request->validate([
      'token' => 'required',
      'password' => 'required|min:8|confirmed',
  ]);
   $user=User::where('remember_token','=',$request->token)->first();
   if(!empty($user))
   {
      if($request->password == $request->password_confirmation)
      {
         $user->password=Hash::make($request->password);
         if (empty($user->email_verified_at)) {
            $user->email_verified_at = now();
        }
         $user->remember_token=Str::random(40);
         $user->save();
         return redirect()->route('login')->with([
            'success'=>"le mot de passe est réinitialiser avec succés"
         ]);
      }
      else
      {
         return redirect()->back()->with('error','le mot de passe et confirmation mot de passe ne sont pas confome');


      }

   }
   else
   {
      abort(404);

   }
}
//Reinitialisation de mot de passe client 
public function forgotform_client()
{
   $categoriesParentes = Category::whereNull('parent_id')->get();
   $categories = [];
   foreach ($categoriesParentes as $categorieParente) {
       $sousCategories = $categorieParente->sousCategories; // Assurez-vous que la relation sousCategories renvoie une collection
       $categories[] = [
           'categorieParente' => $categorieParente,
           'sousCategories' => $sousCategories,
       ];
   }
   return view('client-views.authentification.forgotClient',compact('categories'));

}

// public function reset_client_traitement(Request $request)
// {
//    $request->validate([
//       'token' => 'required',
//       'password' => 'required|min:8|confirmed',
//   ]);
//    $user=User::where('remember_token','=',$request->token)->first();
//    if(!empty($user))
//    {
//       if($request->password == $request->password_confirmation)
//       {
//          $user->password=Hash::make($request->password);
//          if (empty($user->email_verified_at)) {
//             $user->email_verified_at = now();
//         }
//          $user->remember_token=Str::random(40);
//          $user->save();
//          return redirect()->route('login')->with([
//             'success'=>"le mot de passe est réinitialiser avec succés"
//          ]);
//       }
//       else
//       {
//          return redirect()->back()->with('error','le mot de passe et confirmation mot de passe ne sont pas confome');


//       }

//    }
//    else
//    {
//       abort(404);

//    }
// }

   public function reset_client($token)
{
   $categoriesParentes = Category::whereNull('parent_id')->get();
   $categories = [];
   foreach ($categoriesParentes as $categorieParente) {
       $sousCategories = $categorieParente->sousCategories; // Assurez-vous que la relation sousCategories renvoie une collection
       $categories[] = [
           'categorieParente' => $categorieParente,
           'sousCategories' => $sousCategories,
       ];
   }
   $user=User::where('remember_token',"=",$token)->first();
   if(!empty($user))
   {
   return view('client-views.authentification.resetClient',compact('token','categories'));
   }
   else
   {
      abort(404);

   }
}
   // Affiche le formulaire de demande de réinitialisation de mot de passe
   // public function forgotform_client()
   // {
   //     $categoriesParentes = Category::whereNull('parent_id')->get();
   //     $categories = [];
   //     foreach ($categoriesParentes as $categorieParente) {
   //         $sousCategories = $categorieParente->sousCategories;
   //         $categories[] = [
   //             'categorieParente' => $categorieParente,
   //             'sousCategories' => $sousCategories,
   //         ];
   //     }
   //     return view('client-views.authentification.forgotClient', compact('categories'));
   // }

   // // Envoie l'email de réinitialisation de mot de passe
   // public function forgot_password_client(Request $request)
   // {
   //     $request->validate(['email' => 'required|email']);
   //     $user = User::where('email', $request->email)->first();
       
   //     if ($user) {
   //         $user->remember_token = Str::random(40);
   //         $user->save();
   //         Mail::to($user->email)->send(new ForgotPasswordMail($user));
   //         return redirect()->back()->with('success', 'Email de réinitialisation de mot de passe envoyé avec succès. Consultez votre boîte email pour terminer la réinitialisation.');
   //     } else {
   //         return redirect()->back()->with('error', "L'email n'est pas enregistré dans le système !");
   //     }
   // }

   // // Affiche le formulaire de réinitialisation de mot de passe
   // public function reset_client($token)
   // {
   //     $user = User::where('remember_token', $token)->first();
       
   //     if ($user) {
   //         return view('client-views.authentification.resetClient', compact('token'));
   //     } else {
   //         abort(404);
   //     }
   // }

   // // Traite la réinitialisation de mot de passe
   public function reset_client_traitement(Request $request)
   {
       $request->validate([
           'token' => 'required',
           'password' => 'required|min:8|confirmed',
       ]);
       
       $user = User::where('remember_token', $request->token)->first();
       
       if ($user) {
           $user->password = Hash::make($request->password);
           if (empty($user->email_verified_at)) {
               $user->email_verified_at = now();
           }
           $user->remember_token = Str::random(40);
           $user->save();
           
           return redirect()->route('LoginPage')->with('success', 'Le mot de passe a été réinitialisé avec succès.');
       } else {
           return redirect()->back()->with('error', 'Le jeton de réinitialisation est invalide.');
       }
   }

}