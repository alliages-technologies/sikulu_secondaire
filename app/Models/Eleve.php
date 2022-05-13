<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    public function inscriptions(){
        return $this->hasMany('App\Models\Inscription');
    }

    public function getNameAttribute(){
        return $this->nom . "  ".$this->prenom;
    }

    public function getAgeAttribute(){
        $age = Carbon::parse($this->date_naiss)->age;
        return $age;
    }

}
