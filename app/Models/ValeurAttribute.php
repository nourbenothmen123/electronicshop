<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValeurAttribute extends Model
{
    use HasFactory;
    protected $table = 'valeurattribue';
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribut_id');
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
