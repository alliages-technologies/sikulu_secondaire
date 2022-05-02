<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEnseignement extends Model
{
    //
    protected $guarded = [];
    protected $table = 'types_enseignements';

    public function ecoles(){
        return $this->hasMany('App\Models\Ecole', 'enseignement_id');
    }
}
