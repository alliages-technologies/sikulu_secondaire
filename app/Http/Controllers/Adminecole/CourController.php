<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Matiere;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourController extends Controller
{

    public function index()
    {
        $programmeecoles = ProgrammeEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($programmeecoles);
        return view('Adminecole.Parametres.Cours.index')->with(compact('programmeecoles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $cour = new ProgrammeEcoleLigne();
        $cour->programme_ecole_id = $request->programme_ecole_id;
        $cour->enseignant_id = $request->enseignant_id;
        $cour->token = sha1(date('His'));
        $cour->annee_id = $annee->id;
        $cour->matiere_id = $request->matiere_id;
        $cour->coefficient = $request->coefficient;
        //dd($cour);
        $cour->save();
        return redirect()->back();
    }


    public function show($token)
    {
        $programmeecole = ProgrammeEcole::where('token',$token)->first();
        $pels = ProgrammeEcoleLigne::where('programme_ecole_id',$programmeecole->id)->get();
        $matieres = Matiere::where('ecole_id',Auth::user()->ecole_id)->get();
        $prof_ecoles = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($prof_ecoles);
        return view('Adminecole.Parametres.Cours.show')->with(compact('pels','programmeecole','matieres','prof_ecoles'));
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
