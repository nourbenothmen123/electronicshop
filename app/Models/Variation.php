<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //récupérer les attributs associés à une variation
    public function attributes()
{
    return $this->belongsToMany(Attribute::class, 'valeurattribue', 'variation_id', 'attribut_id');
}

public function variations()
{
    return $this->belongsToMany(Variation::class, 'valeur_attributes', 'attribut_id', 'variation_id')
                ->withPivot('id', 'valeur');
}


// public function valeurAttributes()
// {
//     return $this->belongsToMany(ValeurAttribute::class, 'valeurattributes', 'variation_id', 'attribut_id')
//                 ->withPivot('id', 'valeur');
// }

public function valeurAttributes()
{
    return $this->hasMany(ValeurAttribute::class, 'variation_id');
}


public function promotions()
{
    return $this->belongsToMany(Promotion::class, 'categories_promotions', 'category_id', 'promotion_id')
        ->withTimestamps();
}

}
