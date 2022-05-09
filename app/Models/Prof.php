<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $appends = ['name'];

    public function diplome(){
        return $this->belongsTo('App\Models\Diplome','diplome_id');
    }

    public function getNameAttribute(){
        return $this->nom.' '.$this->prenom;
    }
}
