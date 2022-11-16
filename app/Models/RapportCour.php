<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportCour extends Model
{
    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }

    public function pel(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }

    public function appuie(){
        return $this->belongsTo('App\Models\AppuieCour','appuie_id');
    }

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole','ecole_id');
    }
}
