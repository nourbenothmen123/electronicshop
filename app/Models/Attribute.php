<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'attributcategorie', 'attribut_id', 'categorie_id');
    // }
    public function categories()
{
    return $this->belongsToMany(Category::class, 'attributcategorie', 'attribut_id', 'categorie_id');
}
    public function variations()
    {
        return $this->belongsToMany(Variation::class, 'valeurAttribue', 'attribut_id', 'variation_id');
    }
}
