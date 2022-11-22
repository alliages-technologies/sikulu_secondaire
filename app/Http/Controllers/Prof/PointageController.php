<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\Moi;
use App\Models\Pointage;
use App\Models\ProfEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{

    public function index($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $ecole = Ecole::where('token',$token)->first();
        $prof = Auth::user()->prof->id;
        $mois = Moi::all();
        $prof_ecole = ProfEcole::where('ecole_id',$ecole->id)->where('prof_id',$prof)->first();
        $pointages = Pointage::where('annee_id',$annee->id)->where('prof_id',$prof_ecole->prof_id)->where('ecole_id',$prof_ecole->ecole_id)->get();
        //dd($pointages);
        return view('Prof.Pointages.index')->with(compact('prof_ecole','pointages','mois'));
    }

    public function search($token,$moi)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $ecole = Ecole::where('token',$token)->first();
        $prof = Auth::user()->prof->id;
        $prof_ecole = ProfEcole::where('ecole_id',$ecole->id)->where('prof_id',$prof)->first();
        $pointages = Pointage::where('annee_id',$annee->id)->where('prof_id',$prof_ecole->prof_id)->where('ecole_id',$prof_ecole->ecole_id)->where('mois_id',$moi)->get();
        $moi = Moi::find($moi);
        //dd($pointages);
        return view('Prof.Pointages.search')->with(compact('prof_ecole','moi','pointages'));
    }

}
