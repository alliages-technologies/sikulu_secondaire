<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentEcole extends Model
{
    protected $guarded = [];
    //protected $table = 'parent_ecole';

    public function ecole(){
        return $this->belongsTo("App\Models\Ecole","ecole_id");
    }

    public function parent(){
        return $this->belongsTo("App\User","parent_id");
    }

}
