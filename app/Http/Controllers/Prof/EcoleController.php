<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\Prof;
use App\Models\ProfEcole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcoleController extends Controller
{

    public function index()
    {
        $prof = Prof::where('user_id',Auth::user()->id)->first();
        $ecoles = ProfEcole::where('prof_id',$prof->id)->get();
        return view('Prof.Ecoles.index')->with(compact('ecoles'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $ecole = Ecole::find($id);
        return view('Prof.Ecoles.show')->with(compact('ecole'));
    }


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
