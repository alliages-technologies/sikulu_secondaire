<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $guarded = [];

    public function categorie(){
        return $this->belongsTo('App\Models\CategorieDepense', 'categorie_id');
    }

    public function month(){
        return $this->belongsTo('App\Models\Moi', 'mois');
    }

}
