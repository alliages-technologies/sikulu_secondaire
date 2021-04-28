<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploieTemp;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\TrancheHoraire;

class EmploieTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emploie_temps = EmploieTemp::orderBy('created_at', 'desc')->paginate(8);
        $classes = Classe::all();
        $tranches = TrancheHoraire::all();
        return view('Emploies/index')->with(compact('emploie_temps', 'classes', 'tranches'));
    }

    public function getCourByClasse($id)
    {
        $cours = Cour::all()->where('classe_id', $id)->load('Matiere');
        $data = [];
        foreach ($cours as $cour) {
            # code...
            $data[$cour->id] = $cour->matiere->name;
        }
        return response()->json($data);
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
        $emploie_temp = new EmploieTemp();
        $emploie_temp->cour_id = $request->cour_id;
        $emploie_temp->tranche_id = $request->tranche_id;
        dd($emploie_temp);
        $emploie_temp->save();
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
