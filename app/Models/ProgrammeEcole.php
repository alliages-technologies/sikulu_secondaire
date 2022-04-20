<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeEcole extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_ecoles';

    public function programme_national(){
        return $this->belongsTo('App\Models\ProgrammeNational','programme_national_id');
    }

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole','ecole_id');
    }

    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }

}
