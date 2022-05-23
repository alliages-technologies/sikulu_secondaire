<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Prof;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function index()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $prof = Prof::where('user_id',Auth::user()->id)->first();
        $ligne_programme_ecoles = ProgrammeEcoleLigne::where('enseignant_id',$prof->id)->where('annee_id',$annee_acad->id)->get();
        return view('Prof.Notes.index')->with(compact('ligne_programme_ecoles'));
    }

    public function getInscriptionByToken($token,$ligne_programme_ecole){
        $salle = Salle::where('token',$token)->first();
        $inscriptions = Inscription::where('salle_id',$salle->id)->get();
        $trimestre_ecoles = TrimestreEcole::where('ecole_id',$salle->ecole_id)->where('active',1)->get();
        return view('Prof.Notes.inscription')->with(compact('inscriptions','salle','trimestre_ecoles','ligne_programme_ecole'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $lignes = $request->lignes;
        $ligne_ecole_programme_id = $request->ligne_ecole_programme_id;
        $token = $request->_token;
        for ($i=0; $i < count($lignes); $i++) {
            $note = new Note();
            $note->inscription_id = $lignes[$i]["inscription_id"];
            $note->valeur = $lignes[$i]["note"];
            $note->ligne_ecole_programme_id = $ligne_ecole_programme_id;
            $note->token = $token;
            $note->created_by = Auth::user()->id;
            //dd($note);
            $note->save();
        }
        return response()->json("OK");
    }


    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
