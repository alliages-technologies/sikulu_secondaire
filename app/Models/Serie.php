<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    protected $guarded = [];

    public function type(){
        return $this->belongsTo('App\Models\TypeEnseignement','enseignement_id');
    }
}
