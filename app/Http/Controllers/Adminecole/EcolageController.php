<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Inscription;

class EcolageController extends Controller
{
    public function index(){
        return view('Adminecole.Finances.Ecolages.index');
    }

    public function create(){
        $auth=auth()->user()->ecole_id;
        $salles=Salle::where('ecole_id', $auth)->get();
        return view('Adminecole.Finances.Ecolages.create')->with(compact('salles'));
    }

    public function salleSelect(){
        $salle=request()->selectSalle;
        return response()->json($salle);

        //$inscriptions=Inscription::where('classe_id', $salle)->get();

        /* if($inscriptions){
            return response()->json($inscriptions);
        }else{
            return response()->json("SUIVANT");
        } */
    }

    public function show($id){
        //
    }
}
