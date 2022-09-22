<?php

namespace App\Http\Controllers\Surveillant;

use App\Http\Controllers\Controller;
use App\Models\Abscence;
use App\Models\AnneeAcad;
use App\Models\Inscription;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbscenceController extends Controller
{

    public function index(){
        $abscences = Abscence::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->paginate(10);
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        //dd($abscences);
        return view('Surveillant.Abscences.index')->with(compact('abscences','salles'));
    }

    public function getInscriptionBySalle($salle){
        $inscriptions = Inscription::where('ecole_id',Auth::user()->ecole_id)->where('salle_id',$salle)->get();
        return response()->json($inscriptions);

    }

    public function store(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $lignes = request()->lignes;
        $jour = request()->jour;
        //dd($lignes);
        for ($i=0; $i < count($lignes); $i++) {
            $abscent = new Abscence();
            $abscent->annee_id = $annee_acad->id;
            $abscent->name = sha1(date('ymdhisW')."Ax".date('Wsihdmy'));
            $abscent->inscription_id =  $lignes[$i]['inscription_id'];
            $abscent->ecole_id =  Auth::user()->ecole_id;
            $abscent->jour = $jour;
            $abscent->salle_id =$lignes[$i]['salle_id'];
            //dd($abscent);
            $abscent->save();
        }

        return response()->json('ok');
    }

    public function recherche(){
        $jour = request()->day;
        $salle = request()->classe;
        $annee = AnneeAcad::where('actif',1)->first();
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        $inscriptions = Inscription::where('ecole_id',Auth::user()->ecole_id)->where('annee_id',$annee->id)->get();
        $abscences = Abscence::where('ecole_id',Auth::user()->ecole_id)->where('jour',$jour)->where('salle_id',$salle)->get();
        //dd($abscences);
        return view('Surveillant.Abscences.recherche')->with(compact('abscences','salles'));
    }

}
