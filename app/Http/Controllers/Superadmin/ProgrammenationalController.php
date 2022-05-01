<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
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
        return view('Superadmin.Programmenational.index')->with(compact('programmes_national', 'classes', 'enseignements', 'matieres'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lignes = $request->lignes;
        $classe = $request->classe_id;
        $enseignement = $request->enseignement_id;

        $programmenational = new ProgrammeNational();
        $programmenational->classe_id = $classe;
        $programmenational->enseignement_id = $enseignement;
        $programmenational->annee_id = date('Y');
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


    public function show($id)
    {
        $programmenational = ProgrammeNational::find($id);
        return view('Superadmin.ProgrammeNational.show')->with(compact('programmenational'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
