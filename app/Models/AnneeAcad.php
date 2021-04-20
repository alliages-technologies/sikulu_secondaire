<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeAcad extends Model
{
    public function inscriptions(){
        return $this->hasMany('App\Models\Inscription');
    }
}
