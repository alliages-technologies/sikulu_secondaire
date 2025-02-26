<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    protected $appends = ['matier'];

    public function getMatierAttribute(){
        return $this->pel->matiere->name;
    }

    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }

    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre','trimestre_id');
    }

    public function programme_ecole_ligne(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }

    public function pel(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','ligne_ecole_programme_id');
    }

    public function getTotalmatiereAttribute(){
        return $this->valeur * $this->pel->coefficient;
    }

}
