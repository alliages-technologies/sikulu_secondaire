<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = [];

    public function emploi_temps(){
        return $this->belongsTo('App\Models\EmploieTemp');
    }

    public function lignes_emplois_temps(){
        return $this->hasMany('App\Models\LigneEmploiTemp', 'day_id');
    }
}
