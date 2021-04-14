<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function eleve(){
        return $this->belongsTo('App\Models\Eleve','eleve_id');
    }

    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

}
