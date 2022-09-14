<?php

namespace App\Http\Controllers\Responsablefinances;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Ecolage;
use App\Models\SuiviPaiement;
use Illuminate\Support\Facades\Auth;

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
        $salle=request()->selectSalle;
        $inscriptions=Inscription::where('salle_id', $salle)->get();
        return response()->json($inscriptions);
    }

    public function eleveShowById($id){
        $ecolages = Ecolage::where('inscription_id', $id)->get();
        return response()->json($ecolages);
    }

    public function elevePaiementStore(){
        $annee = AnneeAcad::where('actif',1)->first();
        $id=request()->inscription_id;
        $montant=request()->montant;
        $mois=request()->mois;
        $inscription = Inscription::find($id);

        $ecolage = Ecolage::where('ecole_id', Auth::user()->ecole_id)->where('inscription_id', $id)->where('mois', $mois)->first();
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
            dd("ok");
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

        return response()->json($ecolage);
    }

    public function facture(){
        $ecolage = Ecolage::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->first();
        $ecolages = Ecolage::where('ecole_id',Auth::user()->ecole_id)->where('inscription_id',$ecolage->inscription_id)->get();
        $mois = Moi::where('id',$ecolage->mois)->first();
        //dd($ecolage->inscription->eleve);
        $totalverse = $ecolages->reduce(function ($carry, $item) {
            return $carry + $item->montant;
        });
        $totalannuel = $ecolage->salle->montant * 9;
        $reste_a_payer = $totalannuel-$totalverse;
        //dd($totalverse);
        return view('Responsablefinances.Finances.Ecolages.facture')->with(compact('ecolage','totalverse','totalannuel','reste_a_payer','mois'));
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
        $salle = Salle::where('token', $token)->first();
        $inscriptions = Inscription::where('salle_id', $salle->id)->paginate(15);
        return view('ResponsableFinances.Finances.Ecolages.historiquesalle')->with(compact('salle', 'inscriptions'));
    }

    public function historiquePaiementsEleve($token){
        $inscription = Inscription::where('token', $token)->first();
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
        $inscriptions=Inscription::where('salle_id', $id)->where('ecole_id', auth()->user()->ecole_id)->get();
        return response()->json($inscriptions);
    }

    public function historiqueEleve($id){
        $ecolages=Ecolage::where('inscription_id', $id)->get();
        return response()->json($ecolages);
    }

    public function findEcolagesByMonth($id){
        $ecolages=Ecolage::where('mois', $id)->where('ecole_id', auth()->user()->ecole_id)->get();
        return response()->json($ecolages);
    }
    /*
    Fin des historiques des paiements
    */

    public function show($id){
        //
    }
}
