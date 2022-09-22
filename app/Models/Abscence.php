<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abscence extends Model
{
    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }
    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }
}
