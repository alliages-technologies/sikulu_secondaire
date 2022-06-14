<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfEcole extends Model
{
    protected $guarded = [];
    protected $table = 'prof_ecole';

    public function prof(){
        return $this->belongsTo("App\Models\Prof", "prof_id");
    }

    public function ecole(){
        return $this->belongsTo("App\Models\Ecole", "ecole_id");
    }

}
