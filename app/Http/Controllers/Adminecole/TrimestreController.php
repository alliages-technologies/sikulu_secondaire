<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\TrimestreEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrimestreController extends Controller
{

    public function index(){
        $trimestre_ecoles = TrimestreEcole::where('ecole_id', Auth::user()->ecole_id)->get();
        return view('Adminecole.Parametres.Trimestres.index')->with(compact('trimestre_ecoles'));
    }

    public function trimestreOn($id){
        $trimestre_ecoles = TrimestreEcole::where('ecole_id', Auth::user()->ecole_id)->get();
        foreach ($trimestre_ecoles as $trimestre_ecole) {
            $trimestre_ecole->active = 0;
            $trimestre_ecole->save();
        }
        $trimestre_ecole = TrimestreEcole::find($id);
        $trimestre_ecole->active = 1;
        $trimestre_ecole->save();

        return redirect()->back();
    }

    public function trimestreOff($id){
        $trimestre_ecole = TrimestreEcole::find($id);
        $trimestre_ecole->active = 0;
        $trimestre_ecole->save();

        return redirect()->back();
    }
}
