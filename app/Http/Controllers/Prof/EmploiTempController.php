<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\EmploieTemp;
use App\Models\Inscription;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploiTempController extends Controller
{
    public function indexEcole($ecole){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $ecole = Ecole::where('token',$ecole)->first();
        $prof = Prof::where('user_id', Auth::user()->id)->first();
        //$pes = ProgrammeEcole::where('annee_id',$annee_acad->id)->where('ecole_id',$ecole->id)->get();
        $salles = Salle::where('ecole_id',$ecole->id)->get();
        return view('Prof.Emplois.index')->with(compact('salles','prof'));
    }

    public function getEmploieBySalle($token, $emploi){
        $salle = Salle::where('token',$token)->first();
        $emplois = EmploieTemp::where('salle_id',$salle->id)->get();
        /* $prof = Prof::where('user_id',Auth::user()->id)->first();
        $prof_ecole = ProfEcole::where('ecole_id',$salle->ecole->id)->where('prof_id',$prof->id)->first();
        $lpes = ProgrammeEcoleLigne::where('enseignant_id',$prof->id)->get();
        dd($lpes); */
        return view('Prof.Emplois.emploi')->with(compact('emplois','salle'));
    }

    public function getShowEmploie($token,$id){
        $emploi = EmploieTemp::find($id);
        //$pel = ProgrammeEcoleLigne::find($id);
        //dd($pel);
        $salle = Salle::where('token',$token)->first();
        return view('Prof.Emplois.show_emploi')->with(compact('emploi','salle'));
    }
}
