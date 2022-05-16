<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Moi;
use App\Models\Eleve;
use App\Models\Ecolage;

class EcolageController extends Controller
{
    public function index(){
        return view('Adminecole.Finances.Ecolages.index');
    }

    public function create(){
        $auth=auth()->user()->ecole_id;
        $salles=Salle::where('ecole_id', $auth)->get();
        $inscriptions=Inscription::all();
        $mois=Moi::all();
        return view('Adminecole.Finances.Ecolages.create')->with(compact('salles', 'inscriptions', 'mois'));
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

        $ecolage = Ecolage::updateOrCreate([
            'inscription_id' => $id,
            'montant' => $montant,
            'moi_id' => $mois
        ]);

        /*
        $ecolage = new Ecolage();
        $ecolage->inscription_id=$id;
        $ecolage->montant=$montant;
        $ecolage->moi_id=$mois;
        $ecolage->save();
        */
        return response()->json("PAIEMENT REUSSI");
    }

    public function show($id){
        //
    }
}
