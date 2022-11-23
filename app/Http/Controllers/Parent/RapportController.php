<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\AppuieCour;
use App\Models\Ecole;
use App\Models\Inscription;
use App\Models\LigneEmploiTemp;
use App\Models\RapportCour;
use Illuminate\Http\Request;

class RapportController extends Controller
{

    public function indexEcole($token)
    {
        $inscription = Inscription::where('token',$token)->first();
        $rapport_cours = RapportCour::where('ecole_id',$inscription->ecole_id)->where('salle_id',$inscription->salle_id)->orderBy('id','DESC')->get();
        //dd($rapport_cours);
        return view('Parent.Rapports.index')->with(compact('rapport_cours'));
    }

    public function show($token,$id)
    {
        $rapport_cour = RapportCour::find($id);
        $ligne_emploie_temp = LigneEmploiTemp::where('ligne_programme_ecole_id',$rapport_cour->programme_ecole_ligne_id)->first();
        //dd($rapport_cour);
        return view('Parent.Rapports.show')->with(compact('rapport_cour','ligne_emploie_temp'));
    }

    public function appuieCours($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $appuie_cours = AppuieCour::where('annee_id',$annee->id)->where('salle_id',$inscription->salle_id)->get();
        return view('Parent.Rapports.appuie')->with(compact('appuie_cours'));
    }

    public function appuieCoursShow($token,$id)
    {
        $appuie_cour = AppuieCour::find($id);
        return view('Parent.Rapports.appuie_show')->with(compact('appuie_cour'));
    }
}
