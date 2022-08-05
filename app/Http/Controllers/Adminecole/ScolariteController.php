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
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ScolariteController extends Controller
{
    public function menu(){
        $trimestre_ecoles = TrimestreEcole::where('ecole_id', Auth::user()->ecole_id)->get();
        return view('Adminecole.Scolarites.menu')->with(compact('trimestre_ecoles'));
    }

    public function dashboard($id, $ecole){
        $trimestre_ecole = TrimestreEcole::find($id);
        $trimestre = TrimestreEcole::where('ecole_id',Auth::user()->ecole_id)->where('active',1)->first();
        if ($trimestre) {
            return view('Adminecole.Scolarites.dashboard')->with(compact('trimestre_ecole','trimestre'));
        }
        else{
            $trimestre = 0;
            return view('Adminecole.Scolarites.dashboard')->with(compact('trimestre_ecole','trimestre'));
        }
    }

    public function releveNote($id,$ecole,$trimestre_ecole){

        $trimestre_ecole = TrimestreEcole::find($trimestre_ecole);
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Scolarites.releve')->with(compact('salles','trimestre_ecole')); // Pause
    }

    public function inscription($salle,$ecole,$trimestre_ecole){
        $trimestre_ecole = TrimestreEcole::find($trimestre_ecole);
        $salle = Salle::where('id',$salle)->where('ecole_id',Auth::user()->ecole_id)->first();
        $inscriptions = Inscription::where('classe_id',$salle->classe_id)->where('salle_id',$salle->id)->get();
        return view('Adminecole.Scolarites.inscription')->with(compact('inscriptions','salle','trimestre_ecole'));
    }

    public function inscriptionShow($inscription,$ecole,$salle,$trimestre_ecole){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $salle = Salle::where('id',$salle)->where('ecole_id',Auth::user()->ecole_id)->first();
        $inscriptions = Inscription::where('classe_id',$salle->classe_id)->where('salle_id',$salle->id)->get();
        $inscription = Inscription::find($inscription);

        $notes = Note::where('inscription_id',$inscription->id)->where('trimestre_id',$trimestre_ecole)->get();
        $totaux = $notes->reduce(function ($carry, $item) {
            return $carry + $item->valeur;
        });
        if ($inscription->totalcoefficient) {
            $moyenne = $totaux/$inscription->totalcoefficient;
        }
        else{
            $moyenne = 0;
        }

        $releve_note = ReleveNote::where('inscription_id',$inscription->id)->where('trimestre_id',$trimestre_ecole)->first();
        $mavar = ReleveNote::where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->where('trimestre_id',$trimestre_ecole)->orderBy('moyenne','DESC')->get();
        $rang = 0;
        for ($i=0; $i <$mavar->count() ; $i++) {
            if ($inscription->id == $mavar[$i]->inscription_id) {
                $rang = $i+1;
            }
        }

        return view('Adminecole.Scolarites.inscription_show')->with(compact('totaux','moyenne','inscription','inscriptions','releve_note','rang','notes','salle'));
    }

    public function save($inscription,$ecole,$salle,$trimestre_ecole){
        $inscription = Inscription::find($inscription);
        $releve_note = ReleveNote::where('inscription_id',$inscription->id)->where('trimestre_id',$trimestre_ecole)->first();
        $salle = Salle::where('id',$salle)->where('ecole_id',Auth::user()->ecole_id)->first();
        $inscriptions = Inscription::where('classe_id',$salle->classe_id)->where('salle_id',$salle->id)->get();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $notes = Note::where('inscription_id',$inscription->id)->where('trimestre_id',$trimestre_ecole)->get();
        $mavar = ReleveNote::where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->where('trimestre_id',$trimestre_ecole)->orderBy('moyenne','DESC')->get();
        $rang = 0;
        for ($i=0; $i <$mavar->count() ; $i++) {
            if ($inscription->id == $mavar[$i]->inscription_id) {
                $rang = $i+1;
            }
        }
        PDF::setOptions(['isRemoteEnabled' => TRUE, 'enable_javascript' => TRUE]);
        $pdf=PDF::loadView('Adminecole.Scolarites.pdf', compact('inscriptions','inscription','salle','notes','rang','releve_note'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }

    public function generationAutoReleve(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id', $annee_acad->id)->where('ecole_id',Auth::user()->ecole_id)->get();
        $trimestre_ecole = TrimestreEcole::where('ecole_id',Auth::user()->ecole_id)->where('active',1)->first();
        $notes = Note::where('annee_id', $annee_acad->id)->where('ecole_id', Auth::user()->ecole_id)->where('trimestre_id',request()->trimestre_id)->get();
        //dd(request()->trimestre_id);
        $releve_traite = ReleveTraite::where('annee_id', $annee_acad->id)->where('trimestre_id',request()->trimestre_id)->first();

        if ($releve_traite) {
            dd("Pas de création");
        }

        else {
            //dd("création");
            $releve_traite = new ReleveTraite();
            $releve_traite->trimestre_id = request()->trimestre_id;
            $releve_traite->token =  sha1(date('His'));
            $releve_traite->annee_id = $annee_acad->id;
            $releve_traite->save();

            foreach ($inscriptions as $inscription) {
                $releve_note = new ReleveNote();
                $releve_note->inscription_id = $inscription->id;
                $releve_note->trimestre_id = request()->trimestre_id;
                $releve_note->salle_id = $inscription->salle->id;
                $releve_note->token = sha1(date('His'));
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
                $ligne_releve_note->coefficient = $note->pel->coefficient;
                //dd($ligne_releve_note);
                $ligne_releve_note->save();

                $valeur = LigneReleveNote::where('id',$ligne_releve_note->id)->sum("valeur");
                $moyenne_generale = DB::table('ligne_releve_notes')
                ->select(DB::raw('round(sum(ligne_releve_notes.valeur * ligne_releve_notes.coefficient)/sum(ligne_releve_notes.coefficient),2) as moyenne'))
                ->where('releve_id', '=', $ligne_releve_note->releve_id)
                ->value("moyenne");
                $releve_note = ReleveNote::find($ligne_releve_note->releve_id);
                $releve_note->moyenne = $moyenne_generale;
                $releve_note->save();
            }

        }

    }
        return response()->json("ok");
    }

}
