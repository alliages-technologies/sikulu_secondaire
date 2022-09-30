<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\EmploieTemp;
use App\Models\Inscription;
use App\Models\Prof;
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
        $pes = ProgrammeEcole::where('annee_id',$annee_acad->id)->where('ecole_id',$ecole->id)->get();
        return view('Prof.Emplois.index')->with(compact('pes','prof'));
    }

    public function getEmploieBySalle($token, $ligne_programme_ecole){
        $salle = Salle::where('token',$token)->first();
        $emplois = EmploieTemp::where('salle_id',$salle->id)->get();
        return view('Prof.Emplois.emploi')->with(compact('emplois','salle'));
    }

    public function getShowEmploie($token,$id){
        $emploi = EmploieTemp::find($id);
        $salle = Salle::where('token',$token)->first();
        return view('Prof.Emplois.show_emploi')->with(compact('emploi','salle'));
    }
}
