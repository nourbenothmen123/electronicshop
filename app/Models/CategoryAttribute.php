<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    use HasFactory;
    protected $table = 'attributcategorie';
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribut_id');
    }
}
