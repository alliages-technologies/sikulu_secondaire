<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuiviPaiement extends Model
{
    protected $guarded = [];
    protected $table = 'suivi_paiements';

    public function ecolage(){
        return $this->belongsTo('App\Models\Ecolage', 'paiement_id');
    }

    public function depense(){
        return $this->belongsTo('App\Models\Depense', 'paiement_id');
    }

    public function entree(){
        return $this->belongsTo('App\Models\Entree', 'paiement_id');
    }

    public function inscription(){
        return $this->belongsTo('App\Models\Inscription', 'paiement_id');
    }

    public function getFraisinsciptionAttribute(){
        return $this->inscription->montant_inscri + $this->inscription->montant_frais;
    }
}
