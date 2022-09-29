<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Classe;
use App\Models\Ecole;
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
        $ecole = Ecole::find(Auth::user()->ecole_id);
        $pns = ProgrammeNational::where('enseignement_id',$ecole->enseignement_id)->get();
        //dd($pns);
        return view('Adminecole.Parametres.Salles.index')->with(compact('salles','pns'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $salle = Salle::where('ecole_id',Auth::user()->ecole_id)->where('name','like',request()->name)->where('abb','like',request()->abb)->first();
        //dd($salle);
        if ($salle) {
            request()->session()->flash('info',' Existant dans la liste !!!');
            return redirect()->back();
        }
        else {
            $annee = AnneeAcad::where('actif', 1)->first();
            //dd($annee);
            $salle = new Salle();
            $salle->name = $request->name;
            $salle->abb = $request->abb;
            $salle->nombre_places = $request->nombre_places;
            $salle->ecole_id = Auth::user()->ecole_id;
            $salle->classe_id = $request->classe_id;
            $salle->token = sha1(date('His'));
            $salle->montant = $request->montant;
            $salle->save();

            //programme ecole
            $pn = ProgrammeNational::where('classe_id',$request->classe_id)->first();
            $pe = new ProgrammeEcole();
            $pe->annee_id = $annee->id;
            $pe->programme_national_id = $pn->id;
            $pe->salle_id = $salle->id;
            $pe->ecole_id = $salle->ecole_id;
            $pe->token = sha1(date('His'));
            $pe->save();

            foreach ($pn->ligneprogrammenationals as $lpn) {
                $lpe = new ProgrammeEcoleLigne();
                $lpe->programme_ecole_id = $pe->id;
                $lpe->programme_national_ligne_id = $lpn->national_programme_id;
                $lpe->matiere_id = $lpn->matiere_id;
                $lpe->coefficient = $lpn->coefficient;
                $lpe->annee_id = $annee->id;
                $lpe->token = sha1(date('His'));
                $lpe->save();
            }

            return redirect()->back();
        }

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


    public function destroy($id)
    {
        //
    }
}
