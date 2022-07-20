<?php

namespace App\Http\Controllers\ResponsableFinances;

use App\Http\Controllers\Controller;
use App\Models\SuiviPaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuiviController extends Controller
{
    public function index(){
        $ecole=Auth::user()->ecole_id;
        $paiements=SuiviPaiement::where('ecole_id', $ecole)->orderBy('created_at', 'DESC')->paginate(15);
        return view('ResponsableFinances.Suivis.index')->with(compact('paiements'));
    }

    public function search(Request $request){
        $ecole=Auth::user()->ecole_id;
        $dateDebut = trim($request->get('dateDebut'));
        $dateFin = trim($request->get('dateFin'));

        $paiements=SuiviPaiement::query()
        ->where('created_at', '>=', $dateDebut)
        ->where('created_at', '<=', $dateFin)
        ->where('ecole_id', $ecole)
        ->orderBy('created_at', 'DESC')->get();
        //dd($paiements);
        if($paiements != null){
            return view('ResponsableFinances.Suivis.search')->with(compact('paiements', 'dateDebut', 'dateFin'));
        }else{
            return response()->json('VIDE');
        }

    }
}
