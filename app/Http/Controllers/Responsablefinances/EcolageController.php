<?php

namespace App\Http\Controllers\Responsablefinances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Ecolage;

class EcolageController extends Controller
{
    public function index(){
        return view('Responsablefinances.Finances.Ecolages.index');
    }

    public function create(){
        $auth=auth()->user()->ecole_id;
        $salles=Salle::where('ecole_id', $auth)->get();
        $mois=Moi::all();
        return view('Responsablefinances.Finances.Ecolages.create')->with(compact('salles', 'mois'));
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
            $ecolage->save();
        }else{
            $ecolage->inscription_id=$id;
            $ecolage->montant=$montant;
            $ecolage->moi_id=$mois;
            $ecolage->update();
        }

        return response()->json("PAIEMENT REUSSI");
    }

    /*
    Historiques des paiements
    */

    public function historiquePaiements(){
        $auth=auth()->user()->ecole_id;
        $salles = Salle::where('ecole_id', $auth)->paginate(12);
        return view('Responsablefinances.Finances.Ecolages.historique')->with(compact('salles'));
    }

    public function historiqueSalle($token){
        $salle = Salle::where('token', $token)->first();
        $inscriptions = Inscription::where('salle_id', $salle->id)->paginate(15);
        return view('Responsablefinances.Finances.Ecolages.historiquesalle')->with(compact('salle', 'inscriptions'));
    }

    public function historiquePaiementsEleve($token){
        $inscription = Inscription::where('token', $token)->first();
        return view('Responsablefinances.Finances.Ecolages.historiqueeleve')->with(compact('inscription'));
    }

    /*
    Fin des historiques des paiements
    */

    public function show($id){
        //
    }
}
