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

}
