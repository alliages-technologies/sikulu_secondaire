<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ReleveNote extends Model
{
    public function inscription(){
        return $this->belongsTo('App\Models\Inscription');
    }

    public function annee(){
        return $this->belongsTo('App\Models\AnneeAcad');
    }

    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre');
    }

    public function getPositionAttribute(){
        $releves = ReleveNote::orderBy('moyenne','DESC')->where('annee_id',$this->annee->id)->where('trimestre_id',$this->trimestre->id)->get();
        $releve = ReleveNote::orderBy('moyenne','DESC')->where('annee_id',$this->annee->id)->where('trimestre_id',$this->trimestre->id)->where('inscription_id',$this->inscription->id)->first();
        //dd($releves);
    }

    public function getRangAttribute(){

        $releves = ReleveNote::orderBy('moyenne','DESC')->where('annee_id',$this->annee->id)->where('trimestre_id',$this->trimestre->id)->where('inscription_id',$this->inscription->id)->get();
        //dd($releves);
        $rang = $releves->shift();
        dd($rang);
        return $rang;
    }
}
