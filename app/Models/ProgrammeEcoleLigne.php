<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeNationalLigne extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_ecoles_lignes';

    public function programme_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_national_id');
    }

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere','matiere_id');
    }

    public function enseignant(){
        return $this->belongsTo('App\User','enseignant_id');
    }

}
