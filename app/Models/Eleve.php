<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    public function inscriptions(){
        return $this->hasMany('App\Models\Inscription');
    }
}
