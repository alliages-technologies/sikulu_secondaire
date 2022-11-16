<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\AppuieCour;
use App\Models\Ecole;
use App\Models\LigneEmploiTemp;
use App\Models\Prof;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\RapportCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    //

    public function index($token)
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $ecole = Ecole::where('token',$token)->first();
        $prof = Prof::where('user_id',Auth::user()->id)->first();
        $rapport_cours = RapportCour::where('ecole_id',$ecole->id)->where('prof_id',$prof->id)->get();
        //dd($rapport_cours);
        $appuie_cours = AppuieCour::where('user_id',Auth::user()->id)->where('ecole_id',$ecole->id)->get();
        $pes = ProgrammeEcole::where('ecole_id',$ecole->id)->get();
        //dd($rapport_cours);
        return view('Prof.Rapports.index')->with(compact('prof','pes','ecole','rapport_cours','appuie_cours'));
    }

    public function store()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $rapport_cour = new RapportCour();
        $rapport_cour->name = request()->name;
        $rapport_cour->appuie_id = request()->appuie_id;
        $rapport_cour->programme_ecole_ligne_id = request()->programme_ecole_ligne_id;
        $programme_ecole_ligne = ProgrammeEcoleLigne::find(request()->programme_ecole_ligne_id);
        $rapport_cour->ecole_id = $programme_ecole_ligne->pe->ecole_id;
        $rapport_cour->salle_id = $programme_ecole_ligne->pe->salle_id;
        $rapport_cour->detail = request()->detail;
        $rapport_cour->prof_id = $programme_ecole_ligne->enseignant_id;
        $rapport_cour->annee_id = $annee_acad->id;
        $rapport_cour->dte = date('Y-m-d');
        //dd($rapport_cour);
        $rapport_cour->save();
        return redirect()->back();
    }

    public function show($token,$id)
    {
        $rapport_cour = RapportCour::find($id);
        $ligne_emploie_temp = LigneEmploiTemp::where('ligne_programme_ecole_id',$rapport_cour->programme_ecole_ligne_id)->first();
        //dd($rapport_cour);
        return view('Prof.Rapports.show')->with(compact('rapport_cour','ligne_emploie_temp'));
    }

}
