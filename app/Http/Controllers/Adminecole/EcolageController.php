<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;
use App\Models\Eleve;

class EcolageController extends Controller
{
    public function index(){
        return view('Adminecole.Finances.Ecolages.index');
    }

    public function create(){
        $auth=auth()->user()->ecole_id;
        $salles=Salle::where('ecole_id', $auth)->get();
        $inscriptions=Inscription::all();
        return view('Adminecole.Finances.Ecolages.create')->with(compact('salles', 'inscriptions'));
    }

    public function salleSelect(){
        $salle=request()->selectSalle;
        $inscriptions=Inscription::where('salle_id', $salle)->get();
        return response()->json($inscriptions);
    }

    public function show($id){
        //
    }
}
