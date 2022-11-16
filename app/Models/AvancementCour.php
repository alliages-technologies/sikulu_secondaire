<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvancementCour extends Model
{

    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }

}
