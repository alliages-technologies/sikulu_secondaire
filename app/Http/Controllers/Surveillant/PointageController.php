<?php

namespace App\Http\Controllers\Surveillant;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Matiere;
use App\Models\Pointage;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{
    public function index()
    {
        $pointages = Pointage::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->paginate(10);
        $prof_ecoles = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Surveillant.Pointages.index')->with(compact('pointages','prof_ecoles'));
    }

    public function getMatieresByProf($id)
    {
        $prof = Prof::find($id);
        $pels = ProgrammeEcoleLigne::where('enseignant_id',$prof->id)->get();
        //dd($pels);
        return response()->json($pels);
    } // 1478 14 15 21

    public function store()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $pointage = new Pointage();
        $pointage->prof_id = request()->prof_id;
        $pointage->jour = request()->jour;
        $pointage->nbr_heure = request()->nbr_heure;
        $pointage->ecole_id = Auth::user()->ecole_id;
        $pointage->mois_id = date('m');
        $pointage->annee_id = $annee->id;
        $pointage->ligne_programme_ecole_id = request()->programme_ecole_ligne_id;
        //dd($pointage);
        $pointage->save();
        return response()->json("ok");
    }
}
