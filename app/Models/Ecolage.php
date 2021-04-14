<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecolage extends Model
{
    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }

    public function moi(){
        return $this->belongsTo('App\Models\Moi','moi_id');
    }

}
