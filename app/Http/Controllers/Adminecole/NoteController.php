<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function index()
    {
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Notes.index')->with(compact('salles'));
    }

    public function trimestre($token,$id){
        $salle = Salle::where('token',$token)->first();
        $trimestre_ecoles = TrimestreEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Notes.trimestre')->with(compact('trimestre_ecoles','salle'));
    }

    public function inscriptions($token,$trimestre)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $salle = Salle::where('token',$token)->first();
        $inscriptions = Inscription::where('annee_id',$annee->id)->where('salle_id',$salle->id)->get();
        $notes = Note::where('salle_id',$salle->id)->get();
        $trimestre_ecole = TrimestreEcole::find($trimestre);
        //dd($inscriptions);
        return view('Adminecole.Notes.inscription')->with(compact('salle','inscriptions','trimestre_ecole','notes'));
    }

    public function inscription($token,$inscription,$trimestre)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $salle = Salle::where('token',$token)->first();
        $notes = Note::where('ecole_id',Auth::user()->ecole_id)->where('annee_id',$annee->id)->where('inscription_id',$inscription)->where('trimestre_id',$trimestre)->where('salle_id',$salle->id)->get();
        dd($trimestre);
        //dd($notes);
        $inscription = Inscription::find($inscription);
        return view('Adminecole.Notes.inscription_show')->with(compact('notes','inscription'));
    }

    public function noteById($id){
        $note = Note::find($id);
        //dd($note);
        return response()->json($note);
    }

    public function noteSave(){
        $valeur = request()->valeur;
        $note = Note::find(request()->note_id);
        $note->valeur = $valeur;
        //dd($note);
        $note->save();
        return redirect()->back();
    }

}
