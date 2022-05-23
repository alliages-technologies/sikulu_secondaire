<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploieTemp extends Model
{
    public function cour(){
        return $this->belongsTo('App\Models\Cour','cour_id');
    }

    public function tranche(){
        return $this->belongsTo('App\Models\TrancheHoraire','tranche_id');
    }

    public function lets(){
        return $this->hasMany('App\Models\LigneEmploiTemp','emploi_id');
    }

    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }
}
