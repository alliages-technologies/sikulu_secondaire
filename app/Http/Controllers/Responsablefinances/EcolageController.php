<?php

namespace App\Http\Controllers\ResponsableFinances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Ecolage;
use App\Models\SuiviPaiement;

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
        $id=request()->inscription_id;
        $montant=request()->montant;
        $mois=request()->mois;

        $ecolage = Ecolage::where('inscription_id', $id)->where('moi_id', $mois)->first();
        if($ecolage == null){
            $ecolage = new Ecolage();
            $ecolage->inscription_id=$id;
            $ecolage->montant=$montant;
            $ecolage->moi_id=$mois;
            $ecolage->semaine=date('W');
            $ecolage->mois=date('n');
            $ecolage->annee=date('Y');
            $ecolage->save();
        }else{
            $ecolage->inscription_id=$id;
            $ecolage->montant=$montant;
            $ecolage->moi_id=$mois;
            $ecolage->semaine=date('W');
            $ecolage->mois=date('n');
            $ecolage->annee=date('Y');
            $ecolage->update();
        }
        $ecole=auth()->user()->ecole_id;
        $suivi=new SuiviPaiement();
        $suivi->paiement_id=$ecolage->id;
        $suivi->type="ECOLAGE";
        $suivi->ecole_id=$ecole;
        $suivi->semaine = $ecolage->semaine;
        $suivi->mois = $ecolage->mois;
        $suivi->annee = $ecolage->annee;
        $suivi->token = sha1((date('ymdhisW'))."A-suiviEcolage-x".(date('ymdhisW')));
        $suivi->save();

        return response()->json("PAIEMENT REUSSI");
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

    /*
    Fin des historiques des paiements
    */

    public function show($id){
        //
    }
}
