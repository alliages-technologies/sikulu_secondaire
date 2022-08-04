<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\TrancheHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrancheController extends Controller
{

    public function index()
    {

        $tranche_horaires = TrancheHoraire::where('ecole_id',Auth::user()->ecole_id)->orderBy('id', 'desc')->paginate(10);
        return view('Adminecole.Parametres.Tranches.index')->with(compact('tranche_horaires'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tranche_horaire = new TrancheHoraire();
        $tranche_horaire->heure_debut = $request->heure_debut;
        $tranche_horaire->heure_fin = $request->heure_fin;
        $tranche_horaire->ecole_id = Auth::user()->ecole_id;
        $tranche_horaire->save();
        return redirect()->back();
    }


    public function show($id)
    {
        //
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
