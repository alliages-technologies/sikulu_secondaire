<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProgrammeEcoleLigne extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_ecoles_lignes';
    protected $appends = ['matieren','prof'];

    public function programme_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_national_id');
    }

    public function programmeecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_ecole_id');
    }

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere','matiere_id');
    }

    public function enseignant(){
        return $this->belongsTo('App\Models\Prof','enseignant_id');
    }

    public function getMatierenAttribute(){
        return $this->matiere->name;
    }

    public function getProfAttribute(){
        return $this->enseignant?$this->enseignant->name:"aucun";
    }

    public function notes(){
        return $this->hasMany('App\Models\Note','ligne_ecole_programme_id');
    }
    
    public function lpn(){
        return $this->belongsTo('App\Models\ProgrammeNationalLigne','programme_national_ligne_id    ');
    }
}
