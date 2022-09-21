<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneReleveNote extends Model
{
    protected $guarded = [];

    public function inscription(){
        return $this->belongsTo('App\Models\Inscription','inscription_id');
    }

    public function trimestre(){
        return $this->belongsTo('App\Models\Trimestre','trimestre_id');
    }

    public function programme_ecole_ligne(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ecole_ligne_id');
    }

    public function pel(){
        return $this->belongsTo('App\Models\ProgrammeEcoleLigne','programme_ligne_ecole_id');
    }

    public function releve(){
        return $this->belongsTo('App\Models\ReleveNote','releve_id');
    }

    public function getTotalmatiereAttribute(){
        return $this->valeur;
    }

    public function getMiniAttribute(){
        $note = Note::where('ligne_ecole_programme_id',$this->pel->id)->min('valeur');
        //dd($note);
        return $note;
    }

    public function getMaxiAttribute(){
        $note = Note::where('ligne_ecole_programme_id',$this->pel->id)->max('valeur');
        //dd($note);
        return $note;
    }

    public function getClassAttribute(){
        $note = Note::where('ligne_ecole_programme_id',$this->pel->id)->avg('valeur');
        //dd($note);
        return round($note,2);
    }

    public function getRangByMoyenneAttribute(){
        $inscription = Inscription::find($this->releve->inscription_id);
        //$mavar = ReleveNote::where('annee_id',$this->releve->annee_id)->where('salle_id',$this->releve->salle_id)->orderBy('moyenne','DESC')->get();
        $mavar = Note::where('annee_id',$this->releve->annee_id)->where('trimestre_id',$this->releve->trimestre_id)->where('ligne_ecole_programme_id',$this->pel->id)->where('salle_id',$this->releve->salle_id)->orderBy('valeur','DESC')->get();
        //dd($mavar);
        $rang = 0;
        for ($i=0; $i <$mavar->count() ; $i++) {
            if ($inscription->id == $mavar[$i]->inscription_id) {
                $rang = $i+1;
                return $rang;
            }
        }
    }

    public function getAppreciationAttribute(){
        if ($this->valeur < 6) {
            return "Médiocre";
        }
        elseif ($this->valeur >= 6 and $this->valeur <= 7) {
            return "Faible";
        }
        elseif ($this->valeur >= 8 and $this->valeur <= 9) {
            return "Insuffisant";
        }
        elseif ($this->valeur >= 10 and $this->valeur <= 11) {
            return "Passable";
        }
        elseif ($this->valeur >= 12 and $this->valeur <= 13) {
            return "Assez Bien";
        }
        elseif ($this->valeur >= 14 and $this->valeur <= 15) {
            return "Bien";
        }
        elseif ($this->valeur == 16) {
            return "Très Bien";
        }
        elseif ($this->valeur >= 17) {
            return "Excellent";
        };
        //dd($appreciation);
    }
}
