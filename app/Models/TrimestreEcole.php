<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrimestreEcole extends Model
{
    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre','trimestre_id');
    }
}
