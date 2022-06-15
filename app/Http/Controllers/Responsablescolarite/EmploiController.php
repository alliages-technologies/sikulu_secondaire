<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
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
        //dd($token);
        $salle = Salle::where('token', $token)->first();
        $id = $salle->id;
        $emploie_temps = EmploieTemp::where('salle_id', $id)->get();
        $tranches = TrancheHoraire::where('ecole_id', Auth::user()->ecole_id)->get();
        $programme_ecole = ProgrammeEcole::where('salle_id', $id)->first();
        $programme_ligne_ecoles = ProgrammeEcoleLigne::where('programme_ecole_id', $programme_ecole->id)->get();
        return view('Responsablescolarite.Emploisdutemps.index')->with(compact('emploie_temps','tranches','salle','programme_ligne_ecoles'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $lignes = $request->lignes;
        $emploi_temp = new EmploieTemp();
        $emploi_temp->name = 'EMP-TEMP'.date('YmdHmis').date('is');
        $emploi_temp->salle_id = $request->salle_id;
        $emploi_temp->token = sha1(date('YmdHisW')."Ax".date('WsiHdmY'));
        $emploi_temp->save();
        for ($i=0; $i < count($lignes) ; $i++) {
            $tranche_id = $lignes[$i]['tranche_id'];
            $programme_ecole_ligne_id = $lignes[$i]['programme_ecole_ligne_id'];
            $ligne_emploi_temp = new LigneEmploiTemp();
            $ligne_emploi_temp->ligne_programme_ecole_id = $programme_ecole_ligne_id;
            $ligne_emploi_temp->tranche_id = $tranche_id;
            $ligne_emploi_temp->emploi_id = $emploi_temp->id;
            $ligne_emploi_temp->save();
        }
        return response()->json("OK");

    }

    public function menu(){
        $salles = Salle::where('ecole_id', Auth::user()->ecole_id)->get();
        return view('Responsablescolarite.Emploisdutemps.menu')->with(compact('salles'));
    }

    public function show($token)
    {
        $emploi_temp = EmploieTemp::where('token', $token)->first();
        return view("Responsablescolarite.Emploisdutemps.show")->with(compact('emploi_temp'));
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
