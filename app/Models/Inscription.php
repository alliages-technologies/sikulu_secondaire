<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

    protected $guarded = [];
    protected $appends = ["name"];

    public function eleve(){
        return $this->belongsTo('App\Models\Eleve','eleve_id');
    }

    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

    public function annee_acad(){
        return $this->belongsTo('App\Models\AnneeAcad','anneeacad_id');
    }

    public function salle(){
        return $this->belongsTo('App\Models\Salle','salle_id');
    }

    public function programme_ecole(){
        return $this->belongsTo('App\Models\ProgrammeEcole','programme_ecole_id');
    }

    public function getNameAttribute(){
        return $this->eleve->nom.' '.$this->eleve->prenom;
    }

    public function ecolages(){
        return $this->hasMany('App\Models\Ecolage');
    }

    public function notes(){
        return $this->hasMany('App\Models\Note');
    }

    public function getTotalcoefficientAttribute(){
        $notes = $this->notes;
        $total = $notes->reduce(function ($carry, $item) {
            return $carry + $item->pel->coefficient;
        });
        return $total;
    }

    public function getTotauxAttribute(){
        $notes = $this->notes;
        $total = $notes->reduce(function ($carry, $item) {
            return $carry + $item->totalmatiere;
        });
        return $total;
    }

    public function getMoyenneAttribute(){
        if ($this->totalcoefficient == null) {
            $moyenne = round(($this->totaux)/1, 2);
            return $moyenne;
        }
        else{
            $moyenne = round(($this->totaux)/$this->totalcoefficient, 2);
            return $moyenne;
        }
    }

    public function getRangAttribute(){
        return 0;
    }

}
