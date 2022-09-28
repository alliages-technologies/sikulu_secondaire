<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
use App\Models\Prof;
use App\Models\ProfEcole;
use Illuminate\Http\Request;

class PointageController extends Controller
{

    public function index()
    {
        return view('ResponsableScolarite.Pointages.index');
    }

    public function show($id){

    }

    public function pointer(){
        $prof_ecole = ProfEcole::find(request()->id);
        $prof_ecole->montant = request()->montant;
        //dd($prof_ecole);
        $prof_ecole->save();
        return redirect()->back();
    }

}
