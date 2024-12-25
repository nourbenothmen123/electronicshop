<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['total']; // Spécifiez les colonnes que vous souhaitez remplir

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    
}
