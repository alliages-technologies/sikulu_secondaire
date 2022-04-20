<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeNationalLigne extends Model
{
    protected $guarded = [];
    protected $table = 'programmes_national_lignes';

    public function programme_national(){
        return $this->belongsTo('App\Models\ProgrammeNational','programme_national_id');
    }

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere','matiere_id');
    }

}
