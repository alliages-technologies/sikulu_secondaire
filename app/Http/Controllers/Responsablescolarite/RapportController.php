<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\LigneEmploiTemp;
use App\Models\RapportCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{

    public function index()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $rapport_cours = RapportCour::where('dte',date('Y-m-d'))->where('annee_id',$annee->id)->where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($rapport_cours);
        return view('ResponsableScolarite.Profs.rapport')->with(compact('rapport_cours'));
    }

    public function show($token,$id)
    {
        $rapport_cour = RapportCour::find($id);
        $ligne_emploie_temp = LigneEmploiTemp::where('ligne_programme_ecole_id',$rapport_cour->programme_ecole_ligne_id)->first();
        //dd($rapport_cour);
        return view('ResponsableScolarite.Profs.rapport_show')->with(compact('rapport_cour','ligne_emploie_temp'));
    }
}
