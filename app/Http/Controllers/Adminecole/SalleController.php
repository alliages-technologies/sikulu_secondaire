<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{

    public function index()
    {
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->paginate(10);
        return view('Adminecole.Salle.index')->with(compact('salles'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $salle = new Salle();
        $salle->name = $request->name;
        $salle->abb = $request->abb;
        $salle->nombre_places = $request->nombre_places;
        $salle->ecole_id = Auth::user()->ecole_id;
        //dd($salle);
        $salle->save();
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
