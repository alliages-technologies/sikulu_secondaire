<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

    protected $guarded = [];

    public function eleve(){
        return $this->belongsTo('App\Models\Eleve','eleve_id');
    }

    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

    public function annee_acad(){
        return $this->belongsTo('App\Models\AnneeAcad','anneeacad_id');
    }

    public function salle_id(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }

    public function programme_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_ecole_id');
    }

}
