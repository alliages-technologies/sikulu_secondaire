<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecolage extends Model
{
    protected $appends = ["month", "jour", "eleve"];

    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }

    public function moi(){
        return $this->belongsTo('App\Models\Moi','mois');
    }

    public function getMonthAttribute(){
        return $this->moi->name;
    }

    public function getJourAttribute(){
        return $this->created_at->format('d/n/Y');
    }

    public function getEleveAttribute(){
        return $this->inscription->eleve->name;
    }

    public function suivis(){
        return $this->hasMany('App\Models\SuiviPaiement', 'paiement_id');
    }
}
