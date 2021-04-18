<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere','matiere_id');
    }
}
