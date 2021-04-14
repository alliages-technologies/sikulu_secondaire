<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moi;
use App\Models\Inscription;
use App\Models\Ecolage;

class EcolageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecolages = Ecolage::orderBy('created_at','desc')->paginate(10);
        $mois = Moi::where('visible',1)->get();
        $inscriptions = Inscription::all();
        return view('/Ecolages/index')->with(compact('ecolages','inscriptions','mois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ecolage = new Ecolage();
        $ecolage->inscription_id = $request->inscription_id;
        $ecolage->moi_id = $request->moi_id;
        $ecolage->montant = $request->montant;
        //dd($ecolage);
        $ecolage->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
