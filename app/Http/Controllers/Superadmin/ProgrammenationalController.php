<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\ProgrammeNational;
use App\Models\ProgrammeNationalLigne;
use App\Models\TypeEnseignement;
use Illuminate\Http\Request;

class ProgrammenationalController extends Controller
{

    public function index()
    {
        $programmes_national = ProgrammeNational::orderBy('id', 'desc')->paginate(10);
        $classes = Classe::all();
        $enseignements = TypeEnseignement::all();
        $matieres = Matiere::all();
        return view('Superadmin.ProgrammeNational.index')->with(compact('programmes_national', 'classes', 'enseignements', 'matieres'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $annee = AnneeAcad::where('actif',1)->first();
        $programmenational = ProgrammeNational::where('classe_id',$request->classe_id)->where('enseignement_id',$request->enseignement_id)->first();
        //dd($programmenational);
        if ($programmenational) {
            request()->session()->flash('info',' Existant dans la liste !!!');
            return redirect()->back();
        }
        else {
            $lignes = $request->lignes;
            $classe = $request->classe_id;
            $enseignement = $request->enseignement_id;

            $programmenational = new ProgrammeNational();
            $programmenational->classe_id = $classe;
            $programmenational->enseignement_id = $enseignement;
            $programmenational->annee_id = $annee->id;
            $programmenational->save();

            for ($i=0; $i < count($lignes) ; $i++) {
                $matiere = $lignes[$i]['matiere_id'];
                $coef = $lignes[$i]['coef'];
                $ligne_programmenational = new ProgrammeNationalLigne();
                $ligne_programmenational->matiere_id = $matiere;
                $ligne_programmenational->coefficient = $coef;
                $ligne_programmenational->national_programme_id = $programmenational->id;
                $ligne_programmenational->save();
            }
            return response()->json('OK');
        }
    }


    public function show($id)
    {
        $programmenational = ProgrammeNational::find($id);
        $matieres = Matiere::all();
        return view('Superadmin.ProgrammeNational.show')->with(compact('programmenational','matieres'));
    }


    public function edit($id)
    {
        $programmenational_ligne = ProgrammeNationalLigne::find($id);
        $matieres = Matiere::all();
        return view('Superadmin.ProgrammeNational.edit')->with(compact('programmenational_ligne','matieres'));
    }


    public function update(Request $request, $id)
    {
        $programmes_national_ligne = ProgrammeNationalLigne::find($id);
        $programmenational = ProgrammeNational::find($programmes_national_ligne->programme_national->id);
        $matieres = Matiere::all();
        $programmes_national_ligne->matiere_id = request()->matiere_id;
        $programmes_national_ligne->coefficient = request()->coefficient;
        $programmes_national_ligne->save();
        return redirect()->back();
        //return view('Superadmin.ProgrammeNational.show')->with(compact('programmenational','matieres'));
    }


    public function delete($id)
    {
        $programmes_national_ligne = ProgrammeNationalLigne::find($id);
        //dd($programmes_national_ligne);
        $programmes_national_ligne->delete();
        return redirect()->back();
    }

    public function add($id)
    {
        $programmes_national = ProgrammeNational::find($id);
        $programmes_national_ligne = new ProgrammeNationalLigne();
        $programmes_national_ligne->national_programme_id = $programmes_national->id;
        $programmes_national_ligne->matiere_id = request()->matiere_id;
        $programmes_national_ligne->coefficient = request()->coefficient;
        //dd($programmes_national_ligne);
        $programmes_national_ligne->save();
        return redirect()->back();
    }
}
