<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeEcoleLigne extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_ecoles_lignes';
    protected $appends = ['matieren','prof'];

    public function programme_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_national_id');
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
        return $this->enseignant->name;
    }
}
