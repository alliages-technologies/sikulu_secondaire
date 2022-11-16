<?php

namespace App\Http\Controllers\Responsablefinances;

use App\Http\Controllers\Controller;
use App\Mail\Mail\PaiementMail;
use App\Models\AnneeAcad;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Ecolage;
use App\Models\SuiviPaiement;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EcolageController extends Controller
{
    public function index(){
        return view('ResponsableFinances.Finances.Ecolages.index');
    }

    public function create(){
        $auth=auth()->user()->ecole_id;
        $salles=Salle::where('ecole_id', $auth)->get();
        $mois=Moi::all();
        return view('ResponsableFinances.Finances.Ecolages.create')->with(compact('salles', 'mois'));
    }

    public function salleSelect(){
        $annee = AnneeAcad::where('actif',1)->first();
        $salle=request()->selectSalle;
        $inscriptions=Inscription::where('annee_id',$annee->id)->where('salle_id', $salle)->get();
        return response()->json($inscriptions);
    }

    public function eleveShowById($id){
        $annee = AnneeAcad::where('actif',1)->first();
        $ecolages = Ecolage::where('annee',$annee->id)->where('inscription_id', $id)->get();
        return response()->json($ecolages);
    }

    public function salle(){
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('ResponsableFinances.Finances.Ecolages.salle')->with(compact('salles'));
    }

    public function inscriptionsBySalle($salleToken){
        $annee = AnneeAcad::where('actif',1)->first();
        $salle = Salle::where('token',$salleToken)->first();
        $inscriptions = Inscription::where('annee_id',$annee->id)->where('salle_id',$salle->id)->get();
        return view('ResponsableFinances.Finances.Ecolages.inscription')->with(compact('inscriptions','salle'));
    }

    public function inscription($inscriptionToken){
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('annee_id',$annee->id)->where('token',$inscriptionToken)->first();
        $ecolages = Ecolage::where('annee',$annee->id)->where('inscription_id', $inscription->id)->get();
        $mois = Moi::all();

        $mois_en_cours = date('m');

        $premier_mois = Ecolage::where('annee',$annee->id)->where('inscription_id', $inscription->id)->where('mois',10)->first();
        $montant_mensuel = $inscription->montant_inscri;
        $moi_paye = Ecolage::where('annee',$annee->id)->where('inscription_id', $inscription->id)->count();
        $sense_payer = $moi_paye * $montant_mensuel;
        $montant_deja_paye = Ecolage::where('annee',$annee->id)->where('inscription_id', $inscription->id)->sum('montant');
        $paye_mois_en_cours = Ecolage::where('annee',$annee->id)->where('inscription_id', $inscription->id)->where('mois',$mois_en_cours)->first();
        //dd($inscription);

        if ($premier_mois == null) {
            $statut = "Pas payé";
        }
        else {
            $statut = "Payé";

            if ($paye_mois_en_cours == null) {
                //dd("Mfouka");
            }
            else {
                if ($montant_deja_paye < $sense_payer) {
                    //dd("Mfouka");
                }
                else {
                    //dd("Ata ni mfouka");
                }
            }
        }

        $ecolage_mois_en_cours = Ecolage::where('inscription_id', $inscription->id)->where('mois',$mois_en_cours)->first();

        //dd($ecolage_mois_en_cours);

        return view('ResponsableFinances.Finances.Ecolages.inscription_show')->with(compact('paye_mois_en_cours','premier_mois','montant_deja_paye','sense_payer','mois','ecolages','inscription'));
    }

    public function elevePaiementStore(Request $request){
        $annee = AnneeAcad::where('actif',1)->first();
        $id=request()->inscription_id;
        $montant=request()->montant;
        $mois=request()->mois;
        $inscription = Inscription::find($id);
        //dd($inscription);
        $ecolage = Ecolage::where('annee',$annee->id)->where('ecole_id', Auth::user()->ecole_id)->where('inscription_id', $id)->where('mois', $mois)->first();
        if($ecolage == null){
            $ecolage = new Ecolage();
            $ecolage->inscription_id=$id;
            $ecolage->salle_id = $inscription->salle_id;
            $ecolage->ecole_id=auth()->user()->ecole_id;
            $ecolage->montant=$montant;
            $ecolage->moi_id = date('m');
            $ecolage->mois = $mois;
            $ecolage->semaine=date('W');
            $ecolage->annee = $annee->id;
            $ecolage->save();
        }else{
            //return $request->session()->flash('info',' Sélectionnez un autre mois !!!');
            return redirect()->back();
        }

        $ecole=auth()->user()->ecole_id;

        $suivi=new SuiviPaiement();
        $suivi->paiement_id=$ecolage->id;
        $suivi->type="ECOLAGE";
        $suivi->ecole_id=$ecole;
        $suivi->semaine = date('W');
        $suivi->mois = date('m');
        $suivi->annee = date('Y');
        $suivi->token = sha1((date('ymdhisW'))."A-suiviEcolage-x".(date('ymdhisW')));
        $suivi->save();

        return redirect('/responsablefinances/ecolages/facture/paiement');
    }

    public function inscriptionSearch(){
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('annee_id',$annee->id)->where('token',request()->token)->first();
        $ecolages = Ecolage::where('inscription_id', $inscription->id)->get();
        $mois = Moi::all();
        return view('ResponsableFinances.Finances.Ecolages.inscription_show')->with(compact('mois','ecolages','inscription'));
    }

    public function facture(){
        $annee = AnneeAcad::where('actif',1)->first();
        $user = User::find(Auth::user()->id);
        $ecolage = Ecolage::where('annee',$annee->id)->where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->first();
        $ecolages = Ecolage::where('annee',$annee->id)->where('ecole_id',Auth::user()->ecole_id)->where('inscription_id',$ecolage->inscription_id)->get();
        $mois = Moi::where('id',$ecolage->mois)->first();
        //dd($ecolage->inscription->eleve);
        $totalverse = $ecolages->reduce(function ($carry, $item) {
            return $carry + $item->montant;
        });
        $totalannuel = $ecolage->inscription->montant_inscri * 9;
        $reste_a_payer = $totalannuel-$totalverse;
        //dd($totalverse);

        $inscription = Inscription::find($ecolage->inscription_id);
        $parent = $inscription->eleve->email_tuteur;
        if ($parent) {
            Mail::to($parent)->send(new PaiementMail($user));
        }

        return view('ResponsableFinances.Finances.Ecolages.facture')->with(compact('ecolage','totalverse','totalannuel','reste_a_payer','mois'));
    }

    /*
    Historiques des paiements
    */

    public function historiquePaiements(){
        $auth=auth()->user()->ecole_id;
        $salles = Salle::where('ecole_id', $auth)->paginate(12);
        return view('ResponsableFinances.Finances.Ecolages.historique')->with(compact('salles'));
    }

    public function historiqueSalle($token){
        $annee = AnneeAcad::where('actif',1)->first();
        $salle = Salle::where('token', $token)->first();
        $inscriptions = Inscription::where('annee_id',$annee->id)->where('salle_id', $salle->id)->paginate(15);
        return view('ResponsableFinances.Finances.Ecolages.historiquesalle')->with(compact('salle', 'inscriptions'));
    }

    public function historiquePaiementsEleve($token){
        $annee = AnneeAcad::where('actif',1)->first();
        $inscription = Inscription::where('annee_id',$annee->id)->where('token', $token)->first();
        //dd($inscription->eleve);
        return view('ResponsableFinances.Finances.Ecolages.historiqueeleve')->with(compact('inscription'));
    }

    public function historiqueEcolageGlobal(){
        $ecole=auth()->user()->ecole_id;
        //$paiements=SuiviPaiement::where('ecole_id', $ecole)->where('type', "ECOLAGE")->orderBy('created_at', 'DESC')->paginate(15);
        $salles = Salle::where('ecole_id', $ecole)->get();
        $mois = Moi::all();
        return view('ResponsableFinances.Finances.Ecolages.allhistorique')->with(compact('salles', 'mois'));
    }

    public function findEcolagesInscriptionsBySalle($id){
        $annee = AnneeAcad::where('actif',1)->first();
        $inscriptions=Inscription::where('annee_id',$annee->id)->where('salle_id', $id)->where('ecole_id', auth()->user()->ecole_id)->get();
        return response()->json($inscriptions);
    }

    public function historiqueEleve($id){
        $annee = AnneeAcad::where('actif',1)->first();
        $ecolages=Ecolage::where('annee',$annee->id)->where('inscription_id', $id)->get();
        return response()->json($ecolages);
    }

    public function findEcolagesByMonth($id){
        $annee = AnneeAcad::where('actif',1)->first();
        $ecolages=Ecolage::where('annee',$annee->id)->where('mois', $id)->where('ecole_id', auth()->user()->ecole_id)->get();
        return response()->json($ecolages);
    }
    /*
    Fin des historiques des paiements
    */

    public function show($id){
        //
    }
}
