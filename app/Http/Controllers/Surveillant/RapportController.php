<?php

namespace App\Http\Controllers\Surveillant;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\LigneEmploiTemp;
use App\Models\RapportCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{

    public function index()
    {
        $rapport_cours = RapportCour::where('dte',date('Y-m-d'))->where('ecole_id',Auth::user()->ecole_id)->orderBy('id','DESC')->get();
        //dd($rapport_cours);
        return view('Surveillant.Rapports.index')->with(compact('rapport_cours'));
    }

    public function show($token,$id)
    {
        $rapport_cour = RapportCour::find($id);
        $ligne_emploie_temp = LigneEmploiTemp::where('ligne_programme_ecole_id',$rapport_cour->programme_ecole_ligne_id)->first();
        //dd($rapport_cour);
        return view('Surveillant.Rapports.show')->with(compact('rapport_cour','ligne_emploie_temp'));
    }

}
