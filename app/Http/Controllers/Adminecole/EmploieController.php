<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\EmploieTemp;
use App\Models\LigneEmploiTemp;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use App\Models\TrancheHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploieController extends Controller
{

    public function index($token)
    {
        //dd($token);
        $salle = Salle::where('token', $token)->first();
        $id = $salle->id;

        //dd($id);
        $emploie_temps = EmploieTemp::where('salle_id',$id)->get();
        $tranches = TrancheHoraire::where('ecole_id',Auth::user()->ecole_id)->get();

        $programme_ecole = ProgrammeEcole::where('salle_id',$id)->first();
        $programme_ligne_ecoles = ProgrammeEcoleLigne::where('programme_ecole_id',$programme_ecole->id)->get();
        //dd($programme_ligne_ecoles);
        return view('Adminecole.Emplois.index')->with(compact('emploie_temps','tranches','salle','programme_ligne_ecoles'));
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
        return response()->json("ok");

    }

    public function menu(){
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Emplois.menu')->with(compact('salles'));
    }

    public function show($token)
    {
        $emploi_temp = EmploieTemp::where('token', $token)->first();
        return view("Adminecole.Emplois.show")->with(compact('emploi_temp'));
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
