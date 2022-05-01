<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeEnseignement;
use App\Models\Serie;
use App\Models\Niveau;
use App\Models\Classe;
use App\Models\Matiere;

class ParametreController extends Controller
{
    public function index(){
        return view('Superadmin/Parametres/index');
    }

    /*
    ENSEIGNEMENTS
    */
    public function enseignements(){
        $enseignements=TypeEnseignement::all();
        return view('Superadmin/Parametres/Enseignements/index')->with(compact('enseignements'));
    }

    public function enseignementStore(){
        $enseignement=new TypeEnseignement();
        $enseignement->name=request()->name;
        dd($enseignement);
        $enseignement->save();
        return redirect()->back();
    }

    /*
    SERIES
    */
    public function series(){
        $enseignements=TypeEnseignement::all();
        $series=Serie::all();
        return view('Superadmin/Parametres/Series/index')->with(compact('series', 'enseignements'));
    }
    public function serieStore(){
        $serie=new Serie();
        $serie->name=request()->name;
        //$serie->abb=request()->abb;
        $serie->enseignement_id=request()->enseignement_id;
        $serie->save();
        return redirect()->back();
    }

    /*
    NIVEAUX
    */
    public function niveaux(){
        $niveaux=Niveau::all();
        return view('Superadmin/Parametres/Niveaux/index')->with(compact('niveaux'));
    }

    public function niveauStore(){
        $niveau=new Niveau();
        $niveau->name=request()->name;
        $niveau->abb=request()->abb;
        dd($niveau);
        $niveau->save();
        return redirect()->back();
    }

     /*
     CLASSES
     */
     public function classes(){
         $enseignements=TypeEnseignement::all();
         $series=Serie::all();
         $niveaux=Niveau::all();
         $classes=Classe::all();
        return view('Superadmin/Parametres/Classes/index')->with(compact('classes', 'enseignements', 'series', 'niveaux'));
    }

    public function classeStore(){
        $classe=new Classe();
        $classe->serie_id=request()->serie_id;
        $classe->niveau_id=request()->niveau_id;
        $classe->enseignement_id=request()->enseignement_id;
        $classe->save();
        return redirect()->back();
    }

    /*
     MATIERES
     */
    public function matieres(){
        $matieres=Matiere::all();
        return view('Superadmin/Parametres/Matieres/index')->with(compact('matieres'));
   }

   public function matiereStore(){
       $matiere=new Matiere();
       $matiere->name=request()->name;
       $matiere->abv=request()->abv;
       //$matiere->ecole_id=request()->ecole_id;
       $matiere->save();
       return redirect()->back();
   }
}
