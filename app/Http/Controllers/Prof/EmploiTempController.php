<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\EmploieTemp;
use App\Models\Inscription;
use App\Models\Prof;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploiTempController extends Controller
{
    public function index(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $prof = Prof::where('user_id', Auth::user()->id)->first();
        $ligne_programme_ecoles = ProgrammeEcoleLigne::where('enseignant_id',$prof->id)->where('annee_id',$annee_acad->id)->get();
        return view('Prof.Emplois.index')->with(compact('ligne_programme_ecoles'));
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
