<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Prof;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\ProgrammeNational;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{

    public function indexEcole($token)
    {
        $ecole = Ecole::where('token',$token)->first();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $prof = Prof::where('user_id',Auth::user()->id)->first();
        $pes = ProgrammeEcole::where('annee_id',$annee_acad->id)->where('ecole_id',$ecole->id)->get();
        //dd($ligne_programme_ecoles);
        return view('Prof.Notes.index')->with(compact('pes','prof'));
    }

    public function getInscriptionByToken($token,$ligne_programme_ecole){
        $salle = Salle::where('token',$token)->first();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->get();
        $trimestre_ecoles = TrimestreEcole::where('ecole_id',$salle->ecole_id)->where('active',1)->get();
        return view('Prof.Notes.inscription')->with(compact('inscriptions','salle','trimestre_ecoles','ligne_programme_ecole'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $annee = AnneeAcad::where('actif', 1)->first();
        $lignes = $request->lignes;
        $ligne_ecole_programme_id = $request->ligne_ecole_programme_id;
        $token = $request->_token;
        $trimestre_id = $request->trimestre_id;
        $ligne_ecole_programme = ProgrammeEcoleLigne::find($ligne_ecole_programme_id);
        $note = Note::where('annee_id',$annee->id)->where('trimestre_id',$request->trimestre_id)->where('inscription_id',$lignes[0]["inscription_id"])->where('ligne_ecole_programme_id',$ligne_ecole_programme->id)->first();
        //dd($note);
        if ($note) {
            dd($note);
        }
        for ($i=0; $i < count($lignes); $i++) {
            $note = new Note();
            $note->inscription_id = $lignes[$i]["inscription_id"];
            $note->valeur = $lignes[$i]["note"];
            $note->ligne_ecole_programme_id = $ligne_ecole_programme_id;
            $note->token = Hash::make(date('Y-m-d his'));
            $note->created_by = Auth::user()->id;
            $note->trimestre_id = $trimestre_id;
            $note->annee_id = $annee->id;
            $ligne_ecole_programme = ProgrammeEcoleLigne::find($ligne_ecole_programme_id);
            $note->ecole_id = $ligne_ecole_programme->programmeecole->ecole_id;
            //dd($note);
            $note->save();
        }
        return response()->json("OK");
    }


    public function show($id)
    {

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

    public function addSalle(){
        $notes = Note::all();
        foreach ($notes as $note) {
            $salle = Note::find($note->id)->inscription->salle_id;
            $note = Note::find($note->id);
            $note->salle_id = $salle;
            $note->save();
            //dd($note);
        }
    }

    public function noteGenerateAuto()
    {
        $inscriptions = Inscription::where('salle_id',3)->get();
        //dd($inscriptions);
        foreach ($inscriptions as $inscription) {
            $inscription = Inscription::find($inscription->id);
            for ($i=15; $i < 22 ; $i++) {
                $lep = ProgrammeEcoleLigne::find($i);
                //dd($lep);
                $note = new Note();
                $note->salle_id = $inscription->salle_id;
                $note->valeur = random_int(5,20);
                $note->trimestre_id = 3;
                //$note->created_by = $lep->enseignant_id;
                $note->inscription_id = $inscription->id;
                $note->ecole_id = $inscription->ecole_id;
                $note->ligne_ecole_programme_id = $lep->id;
                $note->annee_id = 1;
                dd($note);
                $note->save();
            }
        }
    }


}
