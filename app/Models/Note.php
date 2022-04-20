<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }

    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre','trimestre_id');
    }

    public function programme_ecole_ligne(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }

}
