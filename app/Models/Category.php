<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'category_image'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

public function attributes()
{
    return $this->belongsToMany(Attribute::class, 'attributcategorie', 'categorie_id', 'attribut_id');
}
public function sousCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'categories_promotions', 'category_id', 'promotion_id')
            ->withTimestamps();
    }
    
}
