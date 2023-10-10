<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneEmploiTemp extends Model
{
    public function ligneprogrammeecole(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','ligne_programme_ecole_id');
    }

    public function tranche(){
        return $this->belongsTo('App\Models\TrancheHoraire','tranche_id');
    }

    public function day(){
        return $this->belongsTo('App\Models\Day', 'day_id');
    }

    public function emploie(){
        return $this->belongsTo('App\Models\EmploieTemp','emploi_id');
    }
}
