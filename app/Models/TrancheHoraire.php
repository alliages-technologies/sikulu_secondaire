<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrancheHoraire extends Model
{
    public function getNameAttribute(){
        return $this->heure_debut.' à '.$this->heure_fin;
    }
}
