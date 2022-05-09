<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeNational extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_national';

    public function classe(){
        return $this->belongsTo('App\Models\Classe','classe_id');
    }

    public function annee(){
        return $this->belongsTo('App\Models\AnneeAcad','annee_id');
    }

    public function enseignement(){
        return $this->belongsTo('App\Models\TypeEnseignement');
    }

    public function ligneprogrammenationals(){
        return $this->hasMany('App\Models\ProgrammeNationalLigne','national_programme_id');
    }

    public function getNameAttribute(){
        return $this->classe->name. ' ' .$this->enseignement->name;
    }

}
