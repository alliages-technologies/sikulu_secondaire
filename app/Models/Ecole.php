<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    //
    protected $guarded = [];

    public function type(){
        return $this->belongsTo('App\Models\TypeEnseignement', 'enseignement_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'ecole_id');
    }

}
