<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded = [];

    public function serie(){
        return $this->belongsTo('App\Models\Serie','serie_id');
    }

    public function niveau(){
        return $this->belongsTo('App\Models\Niveau','niveau_id');
    }

    public function pns(){
        return $this->hasMany('App\Models\ProgrammeNational','classe_id');
    }


    public function getNameAttribute(){
        return $this->niveau->name.' '.$this->serie->name;
    }


}
