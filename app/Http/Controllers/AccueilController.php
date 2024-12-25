<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Marque;
use App\Models\Promotion;

class AccueilController extends Controller
{
    // public function afficher_categories()
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
    //     return view('client-views.accueil.accueil',compact('categories'));
    // }
    // public function afficher_categories()
    // {
    //     $categoriesParentes = Category::whereNull('parent_id')->get();
    //     $categories = [];
    //     foreach ($categoriesParentes as $categorieParente) {
    //         $sousCategories = Category::where('parent_id', $categorieParente->id)->get();
    //         $categories[] = [
    //             'categorieParente' => $categorieParente,
    //             'sousCategories' =>$sousCategories,
    //             //$this->getSousCategories($sousCategories),
    //         ];
    //     }
    //     dump($categories);
    //     return view('client-views.accueil.accueil', compact('categories'));
    // }
    public function afficher_categories()
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
    $marques=Marque::all();
    // $promotions = Promotion::with('variations')->get();
    $dateAujourdhui = Carbon::now()->toDateString();
    $promotions = Promotion::with('variations')
        ->whereDate('date_deb_promo', $dateAujourdhui)
        ->get();
    return view('client-views.accueil.accueil', compact('categories','marques','promotions'));
}


    // private function getSousCategories($sousCategories)
    // {
    //     $categories = [];
    //     foreach ($sousCategories as $sousCategorie) {
    //         $sousSousCategories = Category::where('parent_id', $sousCategorie->id)->get();
    //         $categories[] = [
    //             'sousCategorie' => $sousCategorie,
    //             'sousSousCategories' => $this->getSousCategories($sousSousCategories),
    //         ];
    //     }
    //     return $categories;
    // }
}
