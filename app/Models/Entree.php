<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $guarded = [];

    public function categorie(){
        return $this->belongsTo('App\Models\CategorieEntree', 'categorie_id');
    }

    public function month(){
        return $this->belongsTo('App\Models\Moi', 'mois');
    }

    public function suivis(){
        return $this->hasMany('App\Models\SuiviPaiement', 'paiement_id');
    }
}
