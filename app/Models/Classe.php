<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function serie(){
        return $this->belongsTo('App\Models\Serie','serie_id');
    }
}
