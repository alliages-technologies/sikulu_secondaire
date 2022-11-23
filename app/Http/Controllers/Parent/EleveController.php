<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Day;
use App\Models\Ecolage;
use App\Models\Eleve;
use App\Models\EmploieTemp;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Note;
use App\Models\ReleveNote;
use App\Models\Salle;
use App\Models\Trimestre;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EleveController extends Controller
{


    public function index()
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $eleves = Eleve::where('tel_tuteur',Auth::user()->phone)->get();

        return view('Parent.Ecoles.index')->with(compact('eleves','annee'));
    }


    public function inscriptionShow($token)
    {
        $inscription = Inscription::where('token',$token)->first();
        return view('Parent.Ecoles.inscription_show')->with(compact('inscription'));
    }

    public function inscriptionReleveNote($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $releves = ReleveNote::where('annee_id',$annee->id)->where('inscription_id',$inscription->id)->get();
        return view('Parent.Ecoles.releve_note')->with(compact('inscription','releves'));
    }

    public function inscriptionReleveNoteShow($token,$id)
    {
        $releve = ReleveNote::where('id',$id)->first();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $salle = Salle::where('id',$releve->salle_id)->where('ecole_id',Auth::user()->ecole_id)->first();
        $inscriptions = Inscription::where('ecole_id',$releve->ecole_id)->where('classe_id',$releve->salle->classe_id)->where('salle_id',$releve->salle->id)->get();
        $inscription = Inscription::find($releve->inscription_id);

        $releve_note = ReleveNote::where('ecole_id', Auth::user()->ecole_id)->where('inscription_id',$inscription->id)->where('trimestre_id',$releve->trimestre_id)->first();
        $mavar = ReleveNote::where('ecole_id', $releve->ecole_id)->where('annee_id',$releve->annee_id)->where('salle_id',$releve->salle_id)->where('trimestre_id',$releve->trimestre_id)->orderBy('moyenne','DESC')->get();
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

        //$tri = TrimestreEcole::find($trimestre_ecole)->trimestre;

        $releve_annuel = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$releve->inscription->id)->sum("moyenne");
        $moyenne_annuelle = $releve_annuel/3;
        $premier_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$releve->inscription->id)->where('trimestre_id',1)->first();
        $deuxieme_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$releve->inscription->id)->where('trimestre_id',2)->first();
        $troisieme_trimestre = ReleveNote::where('annee_id',$annee_acad->id)->where('inscription_id',$releve->inscription->id)->where('trimestre_id',3)->first();
        //dd($releve_annuel);


        $releve_note = ReleveNote::where('ecole_id', $releve->ecole_id)->where('inscription_id',$inscription->id)->where('trimestre_id',$releve->trimestre_id)->first();
        $rang_annuel = ReleveNote::where('ecole_id', $releve->ecole_id)->where('annee_id',$annee_acad->id)->where('salle_id',$releve->salle->id)->where('trimestre_id',$releve->trimestre_id)->orderBy('moyenne_annuelle','DESC')->get();
        //dd($rang_annuel);
        $rang_a = 0;
        for ($i = 0; $i < $rang_annuel->count() ; $i++) {
            if ($inscription->id == $rang_annuel[$i]->inscription_id) {
                $rang_a = $i+1;
            }
        }




        //$inscription = Inscription::where('token',$inscriptionToken)->first();
        $ecolages = Ecolage::where('inscription_id', $inscription->id)->get();
        $mois = Moi::all();

        $mois_en_cours = date('m');

        $premier_mois = Ecolage::where('inscription_id', $inscription->id)->where('mois',10)->first();
        $montant_mensuel = $inscription->montant_inscri;
        $moi_paye = Ecolage::where('inscription_id', $inscription->id)->count();
        $sense_payer = $moi_paye * $montant_mensuel;
        $montant_deja_paye = Ecolage::where('inscription_id', $inscription->id)->sum('montant');
        $paye_mois_en_cours = Ecolage::where('inscription_id', $inscription->id)->where('mois',$mois_en_cours)->first();
        $ecolage_mois_en_cours = Ecolage::where('inscription_id', $inscription->id)->where('mois',$mois_en_cours)->first();

        return view('Parent.Ecoles.releve_note_show')->with(compact('paye_mois_en_cours','premier_mois','montant_deja_paye','sense_payer','rang_a','troisieme_trimestre','deuxieme_trimestre','premier_trimestre','moyenne_annuelle','annee_acad','inscription','inscriptions','releve_note','rang','salle'));
    }


    public function note($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $trimestre_ecoles = TrimestreEcole::where('ecole_id',$inscription->ecole_id)->get();
        return view('Parent.Ecoles.note')->with(compact('inscription','trimestre_ecoles'));
    }

    public function inscriptionNoteShow($token,$id)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $trimestre = Trimestre::find($id);
        $notes = Note::where('annee_id',$annee->id)->where('trimestre_id',$trimestre->id)->where('inscription_id',$inscription->id)->get();
        return view('Parent.Ecoles.note_show')->with(compact('inscription','notes'));

    }

    public function emploieTemps($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $emploie_temps  = EmploieTemp::where('salle_id',$inscription->salle_id)->get();
        $days = Day::all();
        return view('Parent.Ecoles.emploie_temps')->with(compact('days','emploie_temps','inscription'));
    }

    public function emploieTempsShow($token)
    {
        $emploi_temp = EmploieTemp::where('token', $token)->first();
        $lignesEmploiTemps = $emploi_temp->lets;
        return view('Parent.Ecoles.emploie_temps_show')->with(compact('emploi_temp','lignesEmploiTemps'));
    }

    public function paiements($token)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('token',$token)->first();
        $ecolages = Ecolage::where('annee',$annee->id)->where('inscription_id',$inscription->id)->get();


        $ecolage = Ecolage::where('annee',$annee->id)->where('ecole_id',$inscription->ecole_id)->where('inscription_id',$inscription->id)->first();
        $ecolages = Ecolage::where('annee',$annee->id)->where('ecole_id',$inscription->ecole_id)->where('inscription_id',$ecolage->inscription_id)->get();
        //$mois = Moi::where('id',$ecolage->mois)->first();
        //dd($ecolage->inscription->eleve);
        $totalverse = $ecolages->reduce(function ($carry, $item) {
            return $carry + $item->montant;
        });
        $totalannuel = $ecolage->inscription->montant_inscri * 9;
        $reste_a_payer = $totalannuel-$totalverse;

        return view('Parent.Ecoles.paiement')->with(compact('totalverse','reste_a_payer','totalannuel','inscription','ecolages'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
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
