<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    //
    protected $guarded = [];

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole','ecole_id');
    }
}
