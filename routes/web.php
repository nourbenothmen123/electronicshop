<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\CategoryAttributeController;
use App\Http\Controllers\ValeurAttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProductBannerController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ListeEnviesController;
use App\Http\Controllers\AProposNousController;
use App\Http\Controllers\VerifierCaisseController;
use App\Http\Middleware\AdminMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//la route par défaut
Route::redirect('/', '/client/accueil');

//Authentication routes 
//route pour afficher le formulaire
Route::get('/login',[AuthController::class,'login'])->name('login');
//route pour traiter la soumission du formulaire de connexion
Route::post('/login',[AuthController::class,'authenticate'])->name('authenticate');

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth',AdminMiddleware::class]], function () {
//Route::group(['middleware'=>['auth','admin']],function(){


//Category routes
Route::get('/index2',[CategoryController::class,'afficher'])->name('index2');

 Route::get('/categorie-form',[CategoryController::class,'select'])->name('categorie-form');

Route::get('/listecategorie',[CategoryController::class,'liste_categorie']);


Route::post('/categories',[CategoryController::class,'store'])->name('categories.create');

//DELETE
Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::get('/modifier-categorie/{id}',[CategoryController::class,'modifier_categorie']);
Route::post('/modifierCategorie/traitement',[CategoryController::class,'modifier_categorie_traitement'])->name('modifier_categorie_traitement');


//product routes

Route::get('/ajouter-produit-form',[ProductController::class,'select'])->name('produit-form');

//CREATE
Route::post('/products',[ProductController::class,'store'])->name('products.create');

Route::get('/index',[ProductController::class,'afficher'])->name('index');

//DELETE
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');

//Modification
Route::get('/modifier-produit/{id}',[ProductController::class,'modifier_produit']);
Route::post('/modifierProduit/traitement',[ProductController::class,'modifier_produit_traitement'])->name('modifier_produit_traitement');




//Attributes routes 
Route::post('/attributes',[AttributeController::class,'store'])->name('attributes.create');
// Route::get('/attribute-form',function(){
//     return view('forms.ajouter-attribute-form');
// })->name('attribute-form');
Route::get('/attribute-form',[AttributeController::class,'selectionner_categories'])->name('attribute-form');

Route::get('/index3',[AttributeController::class,'afficher'])->name('index3');
//DELETE
Route::delete('/attributes/{id}',[AttributeController::class,'destroy'])->name('attributes.destroy');
//Modification
Route::get('/modifier-attribute/{id}',[AttributeController::class,'modifier_attribute']);
Route::post('/modifierAttribute/traitement',[AttributeController::class,'modifier_attribute_traitement'])->name('modifier_attribute_traitement');

//Variation Routes
Route::get('/index4',[VariationController::class,'afficher'])->name('index4');
//CREATE
Route::post('/variations',[VariationController::class,'store'])->name('variations.create');
Route::get('/ajouter-variation-form',[VariationController::class,'selectionner_produit'])->name('variation-form');
Route::delete('/variations/{id}',[VariationController::class,'destroy'])->name('variations.destroy');
Route::get('/modifier-variation/{id}',[VariationController::class,'modifier_variation']);
Route::post('/modifierVariation/traitement',[VariationController::class,'modifier_variation_traitement'])->name('modifier_variation_traitement');
// Route::get('/ajouter-ValeurAttribute-form/{name}/{productName}',[VariationController::class,'selectionner_ValeurAttribute'])->name('ValeurAttribute-form');
//pour rediriger vers le formulaire d'ajout des valeurs
Route::get('/ajouter-ValeurAttribute-form',[VariationController::class,'selectionner_ValeurAttribut'])->name('ValeurAttribute-form');
Route::get('/modifier-ValeurAttribute-form',[VariationController::class,'modifier_ValeurAttribut'])->name('Modifier-ValeurAttribute-form');
//Route::post('/modifier-ValeurAttribute-form',[VariationController::class,'modifier_ValeurAttribut'])->name('Modifier-ValeurAttribute-form');

Route::get('/fetch-category-attributes', [VariationController::class, 'fetchCategoryAttributes'])->name('fetch_category_attributes');

//Categorie-Attribute routes
Route::get('/Categorie-Attribute',[CategoryAttributeController::class,'afficher'])->name('Categorie-Attribute');
Route::get('/ajouter-CatAtt-form',[CategoryAttributeController::class,'selectionner_CategorieAttribute'])->name('CategorieAttribute-form');

Route::post('/CategorieAttribute',[CategoryAttributeController::class,'store'])->name('CategorieAttribute.create');
Route::delete('/CategorieAttribute/{id}',[CategoryAttributeController::class,'destroy'])->name('CategorieAttribute.destroy');
Route::get('/modifier-CategorieAttribute/{id}',[CategoryAttributeController::class,'modifier_CategorieAttribute']);
Route::post('/modifierCategorieAttribute/traitement',[CategoryAttributeController::class,'modifier_CategorieAttribute_traitement'])->name('modifier_CategorieAttribute_traitement');


//Valeur-Attribute routes
Route::get('/Valeur-Attribute',[ValeurAttributeController::class,'afficher'])->name('Valeur-Attribute');
Route::post('/ValeurAttributeForm',[ValeurAttributeController::class,'store'])->name('ValeurAttribute.create');
// Route::get('/Ajouter-Valeur-Attribute',[ValeurAttributeController::class,'afficher_formulaire'])->name('ValeurAttribute-form');
Route::get('/Ajouter-Valeur-AttributeForm',[ValeurAttributeController::class,'ajouter_valeur_attribut'])->name('Ajouter-ValeurAttribute-form');
//  Route::get('/Ajouter-Valeur-Attribute',function(){
//     return view('forms.ajouter-valeur-attribute-form');
//  })->name('ValeurAttribute-form');

Route::delete('/ValeurAttribute/{id}',[ValeurAttributeController::class,'destroy'])->name('ValeurAttribute.destroy');
Route::get('/modifier-ValeurAttribute/{id}',[ValeurAttributeController::class,'modifier_ValeurAttribute'])->name('modifier-ValeurAttribute-form');
Route::post('/modifierValeurAttribute/traitement',[ValeurAttributeController::class,'modifier_ValeurAttribute_traitement'])->name('modifier-ValeurAttribute-traitement');
Route::post('/modifierValeurAttribute',[ValeurAttributeController::class,'modifier_ValeurAttributeVariation'])->name('modifier-ValeurAttribute');



//Permission routes
Route::resource('permissions',App\Http\Controllers\PermissionController::class);
//Role routes 
Route::resource('roles',App\Http\Controllers\RoleController::class);

Route::get('roles/{roleId}/associer-permissions',[RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/associer-permissionsd',[RoleController::class,'givePermissionToRole'])->name('roles.associer-permissions');
Route::get('/liste-rôle-permission',[RolePermissionController::class,'liste_rôle_permission'])->name('liste-rôle-permission');
Route::delete('/RolePermission/{id}',[RoleController::class,'supprimer_role_permission'])->name('RolePermission.destroy');

//route user
Route::get('/user', [UserController::class, 'afficher'])->name('user');

Route::post('/users', [UserController::class, 'store'])->name('users.create');
Route::get('/ajouter-user-form',[UserController::class,'select'])->name('user-form');
Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');
Route::get('/modifier-user/{id}',[UserController::class,'modifier_user']);
Route::post('/modifierUser/traitement',[UserController::class,'modifier_user_traitement'])->name('modifier_user_traitement');

//user profil routes 
Route::get('/modifier-Profil-Utilisateur/{id}',[UserController::class,'modifier_profil_utilisateur'])->name('modifier_profil_utilisateur');
Route::post('/modifier-Profil-Utilisateur/traitement',[UserController::class,'modifier_profil_utilisateur_traitement'])->name('modifier_profil_utilisateur_traitement');
Route::post('/modifier-Motdepasse-Utilisateur/traitement',[UserController::class,'modifier_motdepasse_traitement'])->name('modifier_motdepasse_traitement');

Route::get('/dashboardIndex',function()
{
return view('Dashboard.dashboardIndex');
})->name('dashboardIndex');

//Marque routes 
Route::get('/marques',[MarqueController::class,'afficher_liste_marques'])->name('marques');
Route::get('/ajouter-marque-form',[MarqueController::class,'afficher_form_ajout_marque'])->name('marques-form');
Route::post('/ajouter-marque-traitement',[MarqueController::class,'store'])->name('marques.create');
//Modification
Route::get('/modifier-marque/{id}',[MarqueController::class,'modifier_marque']);
Route::post('/modifierMarque/traitement',[MarqueController::class,'modifier_marque_traitement'])->name('modifier_marque_traitement');
Route::delete('/marques/{id}',[MarqueController::class,'destroy'])->name('marques.destroy');


});
//CLIENT ROUTES

//Accueil page
Route::get('/client/accueil',[AccueilController::class,'afficher_categories'])->name('AccueilPage');

//AboutUS page
Route::get('/client/about-us',function()
{
return view('client-views.about-us');
})->name('AboutUsPage');



//Shop-fullwidth-banner page
Route::get('/client/shop-fullwidth-banner',[ProductBannerController::class,'afficher_categories'])->name('shop-fullwidth-banner');
Route::get('/client/produit-categorie/{idCategorie}',[ProductBannerController::class,'afficher_Produits_Categorie'])->name('afficher_Produits_Categorie');

//Shop-banner-sidebar page
Route::get('/client/shop-banner-sidebar',function()
{
return view('client-views.produits.shop-banner-sidebar');
})->name('shop-banner-sidebar');

Route::get('/client/shop-list',function()
{
return view('client-views.produits.shop-list');
})->name('shop-list');



Route::get('/client/commande',function()
{
return view('client-views.commande.commande');
})->name('commande');




Route::get('/client/product-variation/{id}',[ProductVariationController::class,'afficher_variation_produit'])->name('product-variation');

Route::post('/register/traitement',[AuthController::class,'stocker_client'])->name('register_client');

Route::get('/client/login',[AuthController::class,'afficher_formLogin'])->name('LoginPage');

Route::get('/client/register',[AuthController::class,'afficher_formRegister'])->name('RegisterPage');

Route::post('/login/traitement',[AuthController::class,'login_client_traitement'])->name('login_traitement');

Route::get('/client/logout',[AuthController::class,'logout_client'])->name('logout_client');

Route::post('client/modifier/detailcompte',[ProfilUserController::class,'modifier_info_client'])->name('modifier_info_client');

Route::post('client/changerMotDePasse',[ProfilUserController::class,'changer_motDePasse_Client'])->name('changer_motDePasse_Client');

Route::get('client/detailcompte',[ProfilUserController::class,'detail_compte_client'])->name('detail_compte_client');

Route::get('client/produits',[ProductController::class,'afficher_produits'])->name('filtrer-products');


Route::get('client/panier',[PanierController::class,'afficher_panier'])->name('panier');

Route::get('client/verfierCaisse',[VerifierCaisseController::class,'afficher_caisse'])->name('checkout');

Route::get('/client/produits-liste',function()
{
return view('client-views.produits.produits-liste');
})->name('produits-liste');

Route::get('client/ProfilUser',[ProfilUserController::class,'afficher_profil_client'])->name('ProfilUser');

Route::get('client/Apropos-nous',[AProposNousController::class,'afficher_APropos_nous'])->name('AboutUsPage');

Route::get('client/contactez-nous',[ContactController::class,'afficher_contactez_nous'])->name('ContactUsPage');

Route::get('/detail_Produit',[ProductController::class,'afficher_detail_produit'])->name('DetailProduit');

Route::get('/liste-envies',[ListeEnviesController::class,'afficher_liste_envies'])->name('liste-envies');
Route::get('forgot-password',[AuthController::class,'forgot'])->name('forgotPage');
Route::post('forgot-password',[Authcontroller::class,'forgot_password'])->name('forgot_password');

Route::get('reset-password/{token}',[AuthController::class,'reset'])->name('reset');
Route::post('reset-password',[AuthController::class,'reset_traitement'])->name('reset_traitement');

//promotion routes 
Route::get('/promotion', [PromoController::class, 'afficher'])->name('promotion');
Route::get('/promotion/search', [PromoController::class, 'search'])->name('promotion.search');
Route::delete('/promotions/{id}',[PromoController::class,'destroy'])->name('promotions.destroy');
Route::get('/ajouter-promo-form', [PromoController::class, 'create'])->name('promotions.create');
Route::post('/promotions', [PromoController::class, 'store'])->name('promotions.store');
Route::get('/promotions/{id}', [PromoController::class, 'show'])->name('promotions.show');
Route::get('/modifier-promo/{id}',[PromoController::class,'modifier_promo']);
Route::post('/modifierPromotion/traitement',[PromoController::class,'modifier_promotion_traitement'])->name('modifier_promotion_traitement');
Route::get('/Promotions-Categories',[PromoController::class,'afficher_liste_promotions_categories'])->name('promotions_categories');
Route::get('/Promotions-Produits',[PromoController::class,'afficher_liste_promotions_produits'])->name('promotions_produits');
Route::get('/Promotions-Variations',[PromoController::class,'afficher_liste_promotions_variations'])->name('promotions_variations');


//Reinitialisation de mot de passe client 
Route::get('/forgot-password-client',[AuthController::class,'forgotform_client'])->name('forgotPageClient');
// Route::post('/forgot-password-client',[Authcontroller::class,'forgot_password_client'])->name('forgot_password_client');
Route::get('/reset-password-client/{token}',[AuthController::class,'reset_client'])->name('reset_client');
Route::post('/reset-password-client',[AuthController::class,'reset_client_traitement'])->name('reset_client_traitement');


Route::post('/import-categories', [CategoryController::class, 'importCategories'])->name('import.categories');

//cart routes 
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/product-default', [ProductController::class, 'afficher_produits'])->name('product_default');

Route::get('/cart/details', [CartController::class, 'getCartDetails'])->name('cart.details');
// routes/web.php
Route::get('/api/check-auth', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
});


Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');

Route::get('/commande/{id}', [CommandeController::class, 'show'])->name('commande.details');