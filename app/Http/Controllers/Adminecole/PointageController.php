<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\Pointage;
use App\Models\Prof;
use App\Models\ProfEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{
    public function index()
    {
        $pointages = Pointage::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->paginate(10);
        $prof_ecoles = ProfEcole::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Pointages.index')->with(compact('pointages','prof_ecoles'));
    }

    public function show($prof){
        $pointages = Pointage::where('prof_id',$prof)->get();
        $prof_ecole = Prof::find($prof);
        return view('Adminecole.Pointages.show')->with(compact('pointages','prof'));
    }

}
