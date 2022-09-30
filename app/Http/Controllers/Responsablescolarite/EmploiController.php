<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Day;
use App\Models\EmploieTemp;
use App\Models\LigneEmploiTemp;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use App\Models\TrancheHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploiController extends Controller
{

    public function index($token)
    {
        $days = Day::all();
        $salle = Salle::where('ecole_id',Auth::user()->ecole_id)->where('token', $token)->first();
        $id = $salle->id;
        $emploie_temps = EmploieTemp::where('salle_id', $id)->get();
        $tranches = TrancheHoraire::where('ecole_id', Auth::user()->ecole_id)->get();
        $programme_ecole = ProgrammeEcole::where('salle_id', $id)->first();
        $programme_ligne_ecoles = ProgrammeEcoleLigne::where('programme_ecole_id', $programme_ecole->id)->get();
        return view('ResponsableScolarite.Emploisdutemps.index')->with(compact('emploie_temps','tranches','salle','programme_ligne_ecoles','days'));
    }

    public function menu(){
        $salles = Salle::where('ecole_id', Auth::user()->ecole_id)->get();
        return view('ResponsableScolarite.Emploisdutemps.menu')->with(compact('salles'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $lignes = $request->lignes;
        $emploi_temp = new EmploieTemp();
        $emploi_temp->name = 'EMP-TEMP'.date('YmdHmis').date('is');
        $emploi_temp->salle_id = $request->salle_id;
        $emploi_temp->ecole_id = Auth::user()->ecole_id;
        $emploi_temp->token = sha1(date('YmdHisW')."Ax".date('WsiHdmY'));
        $emploi_temp->annee_id = $annee_acad->id;
        //dd($emploi_temp);
        $emploi_temp->save();
        for ($i=0; $i < count($lignes) ; $i++) {
            $day_id = $lignes[$i]['day_id'];
            $tranche_id = $lignes[$i]['tranche_id'];
            $programme_ecole_ligne_id = $lignes[$i]['programme_ecole_ligne_id'];
            $ligne_emploi_temp = new LigneEmploiTemp();
            $ligne_emploi_temp->ligne_programme_ecole_id = $programme_ecole_ligne_id;
            $ligne_emploi_temp->tranche_id = $tranche_id;
            $ligne_emploi_temp->day_id = $day_id;
            $ligne_emploi_temp->emploi_id = $emploi_temp->id;
            $ligne_emploi_temp->save();
        }
        return response()->json("OK");
    }


    public function show($token)
    {
        $emploi_temp = EmploieTemp::where('token', $token)->first();
        $lignesEmploiTemps = $emploi_temp->lets;
        return view("ResponsableScolarite.Emploisdutemps.show")->with(compact('emploi_temp', 'lignesEmploiTemps'));
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
