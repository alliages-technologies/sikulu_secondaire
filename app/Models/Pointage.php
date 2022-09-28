<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    public function prof(){
        return $this->belongsTo('App\Models\Prof','prof_id');
    }

    public function pel(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','ligne_programme_ecole_id');
    }
}
