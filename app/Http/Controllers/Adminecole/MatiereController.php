<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use App\Models\ProgrammeEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{

    public function index()
    {
        $matieres = Matiere::Orwhere('ecole_id', Auth::user()->ecole_id)->Orwhere('ecole_id', 0)->get();
        return view('Adminecole.Parametres.Matieres.index')->with(compact('matieres'));
    }

    public function store(Request $request)
    {
        $matiere = new Matiere();
        $matiere->name = $request->name;
        $matiere->abv = $request->abv;
        $matiere->ecole_id = Auth::user()->ecole_id;
        $matiere->save();
        return redirect()->back();
    }

    public function on($id){
        $matiere = Matiere::find($id);
        $matiere->active = 1;
        $matiere->save();
        return redirect()->back();
    }

    public function off($id){
        $matiere = Matiere::find($id);
        $matiere->active = 0;
        $matiere->save();
        return redirect()->back();
    }

    public function create()
    {
        //
    }


    public function show($id)
    {
        //
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
