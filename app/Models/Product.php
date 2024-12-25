<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function marque()
    {
        return $this->belongsTo(Marque::class,'id_marque');
    }
    public function promotions()
{
    return $this->belongsToMany(Promotion::class, 'categories_promotions', 'category_id', 'promotion_id')
        ->withTimestamps();
}


}
