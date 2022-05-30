<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Inscription;
use App\Models\LigneReleveNote;
use App\Models\Note;
use App\Models\ReleveNote;
use App\Models\ReleveTraite;
use App\Models\Salle;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ScolariteController extends Controller
{
    public function menu(){
        $trimestre_ecoles = TrimestreEcole::where('ecole_id', Auth::user()->ecole_id)->get();
        return view('Adminecole.Scolarites.menu')->with(compact('trimestre_ecoles'));
    }

    public function index($id,$ecole){
        $trimestre_ecole = TrimestreEcole::find($id);
        return view('Adminecole.Scolarites.index')->with(compact('trimestre_ecole'));
    }

    public function releveNote($id,$ecole,$trimestre_ecole){

        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Scolarites.releve')->with(compact('salles'));
    }

    public function inscription($salle,$ecole){
        $salle = Salle::where('id',$salle)->where('ecole_id',Auth::user()->ecole_id)->first();
        $inscriptions = Inscription::where('classe_id',$salle->classe_id)->get();
        return view('Adminecole.Scolarites.inscription')->with(compact('inscriptions','salle'));
    }

    public function inscriptionShow($inscription,$ecole){
        $inscription = Inscription::find($inscription);
        //dd($inscription->salle_id);
        return view('Adminecole.Scolarites.inscription_show')->with(compact('inscription'));
    }

    public function save(){
        /*
        $lignes = request()->lignes;
        $trimestre_id = request()->trimestre_id;
        $inscription_id = request()->inscription_id;
        //dd($inscription_id);

        $annee = AnneeAcad::where('actif', 1)->first();

        $releve_note = new ReleveNote();
        $releve_note->inscription_id = $inscription_id;
        $releve_note->trimestre_id = $trimestre_id;
        $releve_note->token = Hash::make(date('His'));
        $releve_note->annee_id = $annee->id;
        $releve_note->moi_id = date('m');
        $releve_note->semaine_id = date('W');
        $releve_note->save();

        $releve_traite = new ReleveTraite();
        $releve_traite->inscription_id = $inscription_id;
        $releve_traite->trimestre_id = $trimestre_id;
        $releve_traite->token = Hash::make(date('His'));
        $releve_traite->annee_id = $annee->id;
        $releve_traite->releve_id = $releve_note->id;
        $releve_traite->save();

        for ($i=0; $i < count($lignes) ; $i++) {
            $ligne_releve_note = new LigneReleveNote();
            $ligne_releve_note->programme_ligne_ecole_id = $lignes[$i]['ligne_ecole_programme_id'];
            $ligne_releve_note->releve_id = $releve_note->id;
            $ligne_releve_note->note_id = $lignes[$i]['note_id'];
            $ligne_releve_note->valeur = $lignes[$i]['note'];
            $ligne_releve_note->save();
        }

        return response()->json("OK");
         */
        
    }

    public function generationAutoReleve(){

        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id', $annee_acad->id)->where('user_id',Auth::user()->id)->get();
        $notes = Note::where('annee_id', $annee_acad->id)->where('ecole_id', Auth::user()->ecole_id)->get();

        $releve_traite = ReleveTraite::where('annee_id', $annee_acad->id)->where('trimestre_id',request()->trimestre_id)->first();

        if ($releve_traite == true) {
            dd("Pas de création");
        }

        else {
            $releve_traite = new ReleveTraite();
            $releve_traite->trimestre_id = request()->trimestre_id;
            $releve_traite->token = Hash::make(date('His'));
            $releve_traite->annee_id = $annee_acad->id;
            $releve_traite->save();

            foreach ($inscriptions as $inscription) {
                $releve_note = new ReleveNote();
                $releve_note->inscription_id = $inscription->id;
                $releve_note->trimestre_id = request()->trimestre_id;
            $releve_note->token = Hash::make(date('His'));
            $releve_note->annee_id = $annee_acad->id;
            $releve_note->moi_id = date('m');
            $releve_note->semaine_id = date('W');
            $releve_note->save();

            $inscription = Inscription::find($releve_note->inscription_id);
            foreach ($inscription->notes as $note){
                $ligne_releve_note = new LigneReleveNote();
                $ligne_releve_note->programme_ligne_ecole_id = $note->ligne_ecole_programme_id;
                $ligne_releve_note->releve_id = $releve_note->id;
                $ligne_releve_note->note_id = $note->id;
                $ligne_releve_note->valeur = $note->valeur;
                $ligne_releve_note->save();
            }
        }

        }

        return response()->json("ok");
    }

}
