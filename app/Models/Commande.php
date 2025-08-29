<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'numero_commande',
        'date_commande'
    ];

    protected $casts = [
        'date_commande' => 'date'
    ];

    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class);
    }
}
