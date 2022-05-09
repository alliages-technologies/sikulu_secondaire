<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Classe;
use App\Models\ProgrammeEcole;
use App\Models\ProgrammeEcoleLigne;
use App\Models\ProgrammeNational;
use App\Models\ProgrammeNationalLigne;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{

    public function index()
    {
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->paginate(10);
        $classes = Classe::all();
        return view('Adminecole.Salle.index')->with(compact('salles','classes'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $annee = AnneeAcad::where('actif', 1)->first();
        //dd($annee);
        $salle = new Salle();
        $salle->name = $request->name;
        $salle->abb = $request->abb;
        $salle->nombre_places = $request->nombre_places;
        $salle->ecole_id = Auth::user()->ecole_id;
        $salle->classe_id = $request->classe_id;
        $salle->token = "Token".date('Ymd').date('Ymdhms');
        $salle->save();

        //programme ecole
        $pn = ProgrammeNational::where('classe_id',$request->classe_id)->first();
        $pe = new ProgrammeEcole();
        $pe->annee_id = $annee->id;
        $pe->programme_national_id = $pn->id;
        $pe->salle_id = $salle->id;
        $pe->ecole_id = $salle->ecole_id;
        $pe->token = "Token".date('Ymd').date('Ymdhms');
        $pe->save();

        foreach ($pn->ligneprogrammenationals as $lpn) {
            $lpe = new ProgrammeEcoleLigne();
            $lpe->programme_ecole_id = $pe->id;
            $lpe->programme_national_ligne_id = $lpn->national_programme_id;
            $lpe->matiere_id = $lpn->matiere_id;
            $lpe->coefficient = $lpn->coefficient;
            $lpe->token = "Token".date('Ymd').date('Ymdhms');
            $lpe->save();
        }

        return redirect()->back();
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


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
