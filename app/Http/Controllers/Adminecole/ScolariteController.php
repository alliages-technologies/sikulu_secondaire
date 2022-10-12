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
        $inscriptions = Inscription::where('ecole_id',Auth::user()->ecole_id)->where('classe_id',$salle->classe_id)->where('salle_id',$salle->id)->get();
        $inscription = Inscription::find($inscription);

        $tri_ecole = TrimestreEcole::find($trimestre_ecole)->trimestre_id;
        $releve_note = ReleveNote::where('ecole_id', Auth::user()->ecole_id)->where('inscription_id',$inscription->id)->where('trimestre_id',$tri_ecole)->first();
        $mavar = ReleveNote::where('ecole_id', Auth::user()->ecole_id)->where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->where('trimestre_id',$tri_ecole)->orderBy('moyenne','DESC')->get();
        $rang = 0;
        for ($i = 0; $i < $mavar->count() ; $i++) {
            if ($inscription->id == $mavar[$i]->inscription_id) {
                $rang = $i+1;
                //dd($mavar->count());
            }
            else {
                //$rang = 0;
            }
        }

        $tri = TrimestreEcole::find($trimestre_ecole)->trimestre;

        $releve_annuel = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$inscription->id)->sum("moyenne");
        $moyenne_annuelle = $releve_annuel/3;
        $premier_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$inscription->id)->where('trimestre_id',1)->first();
        $deuxieme_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$inscription->id)->where('trimestre_id',2)->first();
        $troisieme_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$inscription->id)->where('trimestre_id',3)->first();
        //dd($releve_annuel);


        $releve_note = ReleveNote::where('ecole_id', Auth::user()->ecole_id)->where('inscription_id',$inscription->id)->where('trimestre_id',$tri_ecole)->first();
        $rang_annuel = ReleveNote::where('ecole_id', Auth::user()->ecole_id)->where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->where('trimestre_id',$tri_ecole)->orderBy('moyenne_annuelle','DESC')->get();
        //dd($rang_annuel);
        $rang_a = 0;
        for ($i = 0; $i < $rang_annuel->count() ; $i++) {
            if ($inscription->id == $rang_annuel[$i]->inscription_id) {
                $rang_a = $i+1;
            }
        }
        return view('Adminecole.Scolarites.inscription_show')->with(compact('rang_a','troisieme_trimestre','deuxieme_trimestre','premier_trimestre','moyenne_annuelle','tri','annee_acad','inscription','inscriptions','releve_note','rang','salle'));
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

    }

    public function generationAutoReleve(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id', $annee_acad->id)->where('ecole_id',Auth::user()->ecole_id)->get();
        $trimestre_ecole = TrimestreEcole::where('ecole_id',Auth::user()->ecole_id)->where('active',1)->first();
        $notes = Note::where('annee_id', $annee_acad->id)->where('ecole_id', Auth::user()->ecole_id)->where('trimestre_id',request()->trimestre_id)->get();
        $releve_traite = ReleveTraite::where('annee_id', $annee_acad->id)->where('trimestre_id',request()->trimestre_id)->where('ecole_id',Auth::user()->ecole_id)->first();

        $note_trimestre_en_cours = Note::where('trimestre_id',request()->trimestre_id)->first();

        //$notes = $notes->where('inscription_id',33);
        //dd($notes->count());
        //dd($note_trimestre_en_cours);

        // Verification des si les releves ont etes genere

        if ($releve_traite) {
            dd("Pas de création");
        }

        else {
            // Verification si les notes du trimestre en cours existent
            if ($note_trimestre_en_cours) {
                //dd("creation");
                $releve_traite = new ReleveTraite();
                $releve_traite->trimestre_id = request()->trimestre_id;
                $releve_traite->token =  sha1(date('His'));
                $releve_traite->annee_id = $annee_acad->id;
                $releve_traite->ecole_id = Auth::user()->ecole_id;
                $releve_traite->save();

                foreach ($inscriptions as $inscription) {
                    $releve_note = new ReleveNote();
                    $releve_note->inscription_id = $inscription->id;
                    $releve_note->trimestre_id = request()->trimestre_id;
                    $releve_note->salle_id = $inscription->salle_id;
                    $releve_note->token = sha1(date('His'));
                    $releve_note->annee_id = $annee_acad->id;
                    $releve_note->moi_id = date('m');
                    $releve_note->semaine_id = date('W');
                    $releve_note->ecole_id = Auth::user()->ecole_id;
                    $releve_note->save();

                $inscription = Inscription::find($releve_note->inscription_id);
                $notes = $notes->where('inscription_id',$inscription->id);

                //dd($inscription->notes->where('trimestre_id',1));
                foreach ($inscription->notes->where('trimestre_id',request()->trimestre_id) as $note){
                    $ligne_releve_note = new LigneReleveNote();
                    $ligne_releve_note->programme_ligne_ecole_id = $note->ligne_ecole_programme_id;
                    $ligne_releve_note->releve_id = $releve_note->id;
                    $ligne_releve_note->note_id = $note->id;
                    $ligne_releve_note->valeur = $note->valeur;
                    $ligne_releve_note->coefficient = $note->pel->coefficient;
                    $ligne_releve_note->ecole_id = Auth::user()->ecole_id;
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

                    if (request()->trimestre_id == 3) {
                        $releve_note_annuel = ReleveNote::where('inscription_id',$inscription->id)->sum('moyenne');
                        $moyenne_annuelle = $releve_note_annuel/3;
                        $releve_note = ReleveNote::find($releve_note->id);
                        $releve_note->moyenne_annuelle = round(($moyenne_annuelle),2);
                        $releve_note->save();
                    }


                }
            }

        }
        else {
            dd("Non");
        }

    }
        return response()->json("ok");
    }

    public function deleteReleves(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $trimestre_ecole = TrimestreEcole::where('ecole_id',Auth::user()->ecole_id)->where('active',1)->first();
        $releve_notes = ReleveNote::where('trimestre_id',$trimestre_ecole->trimestre->id)->get();

        $releve_traite = ReleveTraite::where('annee_id', $annee_acad->id)->where('trimestre_id',request()->trimestre_id)->where('ecole_id',Auth::user()->ecole_id)->first();
        $releve_traite->delete();
        foreach ($releve_notes as $releve_note) {
            $releve_note = ReleveNote::find($releve_note->id);
            $ligne_releves = LigneReleveNote::where('releve_id',$releve_note->id)->delete();
        }
        ReleveNote::where('trimestre_id',$trimestre_ecole->trimestre->id)->delete();
        return response()->json("ok");
    }
}
