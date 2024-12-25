<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['name_promo', 'type_promo', 'date_deb_promo', 'date_fin_promo', 'pourcentage_promo'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_promotions', 'promotion_id', 'category_id')->withPivot('id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_promotions', 'promotion_id', 'product_id')->withPivot('id');;
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class, 'variations_promotions', 'promotion_id', 'variation_id')->withPivot('id');;
    }
}