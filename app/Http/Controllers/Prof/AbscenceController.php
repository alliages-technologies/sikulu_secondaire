<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Abscence;
use App\Models\AnneeAcad;
use App\Models\Ecole;
use App\Models\Inscription;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbscenceController extends Controller
{
    public function indexEcole($token){
        $ecole = Ecole::where('token',$token)->first();
        //$prof_ecole = ProfEcole::where('prof_id',Auth::user()->prof->id)->first();
        $prof = Prof::where('user_id',Auth::user()->id)->first();
        $abscences = Abscence::where('user_id',Auth::user()->prof->id)->where('ecole_id',$ecole->id)->orderBy('id','desc')->paginate(10);
        //$pels = ProgrammeEcoleLigne::where('enseignant_id',$prof->id)->get();
        $pes = ProgrammeEcole::where('ecole_id',$ecole->id)->get();
        //dd($ples);
        $prof_ecole = ProfEcole::where('prof_id',Auth::user()->prof->id)->first();
        $salles = Salle::where('ecole_id',$prof_ecole->ecole_id)->get();
        //dd($salles);
        return view('Prof.Abscences.index')->with(compact('abscences','salles','pes','prof'));
    }

    public function getInscriptionBySalle($salle){
        $prof_ecole = ProfEcole::where('prof_id',Auth::user()->prof->id)->first();
        $inscriptions = Inscription::where('ecole_id',$prof_ecole->ecole_id)->where('salle_id',$salle)->get();
        //dd($inscriptions);
        return response()->json($inscriptions);

    }

    public function store(){
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $prof_ecole = ProfEcole::where('prof_id',Auth::user()->prof->id)->first();
        $lignes = request()->lignes;
        $jour = request()->jour;
        $programme_ecole_ligne_id = request()->programme_ecole_ligne_id;
        //dd($lignes);
        for ($i=0; $i < count($lignes); $i++) {
            $abscent = new Abscence();
            $abscent->annee_id = $annee_acad->id;
            $abscent->name = sha1(date('ymdhisW')."Ax".date('Wsihdmy'));
            $abscent->inscription_id =  $lignes[$i]['inscription_id'];
            $abscent->ecole_id =  $prof_ecole->ecole_id;
            $abscent->user_id =  $prof_ecole->id;
            $abscent->jour = $jour;
            $abscent->salle_id =$lignes[$i]['salle_id'];
            $abscent->programme_ecole_ligne_id = $programme_ecole_ligne_id;
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
        return view('Prof.Abscences.recherche')->with(compact('abscences','salles'));
    }
}
