<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moi extends Model
{
    protected $guarded = [];

    public function depenses(){
        return $this->hasMany('App\Models\Depense', 'mois');
    }

    public function pointages(){
        return $this->hasMany('App\Models\Pointage');
    }
}
