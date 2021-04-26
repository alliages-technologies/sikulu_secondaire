<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Inscription;
//use PDF;

class DiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function getClasses(){
        $cls = Classe::all();
        return response()->json($cls);
    }

    public function getElevesByClasse($id){
        $inscriptions = Inscription::all()->where('classe_id',$id)->load('Eleve');
        $data=[];
        foreach ($inscriptions as $value) {
            # code...
            $data[$value->id] = $value->eleve->name;
        }
        return response()->json($data);
    }

    public function getInscriptionById($id){
        return response()->json(Inscription::find($id)->load('Eleve'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
/*
	public function getVillesByPay(Request $request){
		$villes = Ville::all()->where('pay_id',$request->pay_id)->toArray();
		return response()->json($villes);
	}

*/


}
