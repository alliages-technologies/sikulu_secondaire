<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrancheHoraire extends Model
{
    protected $guarded = [];

    public function getNameAttribute(){
        return $this->heure_debut.' - '.$this->heure_fin;
    }

    public function programme_ligne_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }

    public function getEcoleAttribute(){
        return $this->programme_ligne_ecole->programme_ecole->ecole->id;
    }

}
