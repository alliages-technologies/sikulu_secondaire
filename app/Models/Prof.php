<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $guarded = [];
    protected $appends = ["dip","name"];

    public function diplome(){
        return $this->belongsTo('App\Models\Diplome','diplome_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getNameAttribute(){
        return $this->nom.' '.$this->prenom;
    }

    public function getDipAttribute(){
        return $this->diplome->name;
    }
}
