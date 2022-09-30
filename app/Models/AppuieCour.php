<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppuieCour extends Model
{
    public function pel(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }
}
