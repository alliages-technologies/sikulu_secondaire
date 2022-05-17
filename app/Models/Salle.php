<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    //
    protected $guarded = [];

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole','ecole_id');
    }

    public function inscriptions(){
        return $this->hasMany('App\Models\Inscription','salle_id');
    }

    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

    public function programmeecoles(){
        return $this->hasMany('App\Models\ProgrammeEcole','salle_id');
    }

}
