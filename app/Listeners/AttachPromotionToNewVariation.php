<?php

namespace App\Listeners;

use App\Events\VariationAdded;
use App\Models\Promotion;

class AttachPromotionToNewVariation
{
    public function handle(VariationAdded $event)
    {
        $variation = $event->variation;
        $product = $variation->product;

        // Récupérer les promotions associées au produit
        $promotions = Promotion::whereHas('products', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->get();

        // Attacher la variation aux promotions
        foreach ($promotions as $promotion) {
            $promotion->variations()->attach($variation->id);
        }
    }
}