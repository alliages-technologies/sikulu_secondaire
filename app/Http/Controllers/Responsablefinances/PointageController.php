<?php

namespace App\Http\Controllers\Responsablefinances;

use App\Http\Controllers\Controller;
use App\Models\Moi;
use App\Models\Pointage;
use App\Models\ProfEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{


    public function index(){
        $mois = Moi::all();
        $prof_ecoles = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('ResponsableFinances.Pointages.index')->with(compact('mois','prof_ecoles'));
    }

    public function store(){
        $mois = request()->mois_id;
        $prof_ecoles = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($prof_ecoles);
        $moi = Moi::find($mois);
        return view('ResponsableFinances.Pointages.search')->with(compact('prof_ecoles','mois','moi'));
    }

}
