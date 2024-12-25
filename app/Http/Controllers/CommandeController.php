<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            // Ajoutez les règles de validation si nécessaire
        ]);

        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->total = $request->total; // Récupérer le total à partir du formulaire
        $commande->save();

        // Enregistrer les produits associés à cette commande
        foreach ($request->products as $product) {
            $commande->products()->create([
                'name' => $product['name'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        // Redirection vers la page de commande avec un message de succès
        return redirect()->route('commande')->with('success', 'Votre commande a été passée avec succès.');
    }
}
