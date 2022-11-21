<?php

namespace App\Http\Controllers\Surveillant;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Inscription;
use App\Models\LigneEmploiTemp;
use App\Models\RapportCour;
use App\Models\RapportJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{

    public function index()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $rapport_cours = RapportCour::where('annee_id',$annee->id)->where('dte',date('Y-m-d'))->where('ecole_id',Auth::user()->ecole_id)->orderBy('id','DESC')->get();
        //dd($rapport_cours);
        return view('Surveillant.Rapports.index')->with(compact('rapport_cours'));
    }

    public function show($token,$id)
    {
        $rapport_cour = RapportCour::find($id);
        $ligne_emploie_temp = LigneEmploiTemp::where('ligne_programme_ecole_id',$rapport_cour->programme_ecole_ligne_id)->first();
        //dd($rapport_cour);
        return view('Surveillant.Rapports.show')->with(compact('rapport_cour','ligne_emploie_temp'));
    }

    public function jour()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $rapport_jours = RapportJour::where('annee_id',$annee->id)->where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Surveillant.Rapport_jours.index')->with(compact('rapport_jours'));
    }

    public function store()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $rapport_jour = new RapportJour();
        $rapport_jour->name = request()->name;
        $rapport_jour->detail = request()->detail;
        $rapport_jour->user_id = Auth::user()->id;
        $rapport_jour->ecole_id = Auth::user()->ecole_id;
        $rapport_jour->annee_id = $annee->id;
        $rapport_jour->dte = date('Y-m-d');
        //dd($rapport_jour);
        $rapport_jour->save();
        return redirect()->back();
    }

    public function rapportShow($token,$id)
    {
        $rapport_jour = RapportJour::find($id);
        //dd($rapport_jour);
        return view('Surveillant.Rapport_jours.show')->with(compact('rapport_jour'));
    }

}
