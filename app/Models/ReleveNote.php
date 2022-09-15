<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ReleveNote extends Model
{
    public function inscription(){
        return $this->belongsTo('App\Models\Inscription');
    }

    public function annee(){
        return $this->belongsTo('App\Models\AnneeAcad');
    }

    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre');
    }


   public function getAppreciationAttribute(){

    if ($this->moyenne >= 10) {
        return "ADMIS(E)";
    }

    else {
        return "ECHOUE";
    }

   }

   public function ligne_releves(){
    return $this->hasMany('App\Models\LigneReleveNote','releve_id');
   }
}
