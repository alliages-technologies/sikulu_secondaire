<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\AnneeAcad;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\ProgrammeNational;
use App\Models\ProgrammeNationalLigne;
use App\Models\Salle;
use App\Models\TypeEnseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgrammeecoleController extends Controller
{

    public function index()
    {
        $programmes_ecole = ProgrammeEcole::where('ecole_id', Auth::user()->ecole_id)->orderBy('id', 'desc')->paginate(15);
        $salles = Salle::where('ecole_id', Auth::user()->ecole_id)->get();
        $programmes_national = ProgrammeNational::all();
        $enseignements = TypeEnseignement::all();
        //dd($salles);
        return view('Adminecole.Programmeecoles.index')->with(compact('salles', 'enseignements', 'programmes_ecole', 'programmes_national'));
    }

    public function getProgrammeNationalById($id){
        $lignes_programmenational = ProgrammeNationalLigne::where('national_programme_id',$id)->get();
        $profs = Prof::all();
        //dd($lignes_programmenational);
        return response()->json($lignes_programmenational);
    }

    public function getProfs(){
        $profs = Prof::all();
        return response()->json($profs);
    }

    public function saveProf(){
        $lpe_id = request()->lpe;
        $prof_id = request()->prof_id;
        $lpe = ProgrammeEcoleLigne::find($lpe_id);
        $lpe->enseignant_id = $prof_id;
        $lpe->save();
        return response()->json("OK");
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $programme_ecole = new ProgrammeEcole();
        $programme_ecole->annee_id = date('Y-m-d');
        $programme_ecole->programme_national_id = $request->programme_national_id;

    }


    public function menu($token)
    {
        //dd($token);
        $salle = Salle::where('token', $token)->first();
        $programme_ecole = $salle->programmeecoles->where('ecole_id', Auth::user()->ecole_id)->where('active',1)->where('annee_id',1)->first();
        $pes = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($programme_ecole);
        return view('Adminecole.Programmeecoles.menu')->with(compact('salle','programme_ecole','pes'));
    }

    public function show($token){
        $annee = AnneeAcad::where('actif',1)->first();
        $salle = Salle::where('token',$token)->first();
        $programme_ecole = $salle->programmeecoles->where('ecole_id', Auth::user()->ecole_id)->where('annee_id',$annee->id)->first();
        $pes = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($programme_ecole);
        return view('Adminecole.Programmeecoles.show')->with(compact('salle','programme_ecole','pes'));
    }

    public function getLignesProgrammeNationalById($id){
        $lignes_programmeecole = ProgrammeEcoleLigne::find($id);
        return response()->json($lignes_programmeecole);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
