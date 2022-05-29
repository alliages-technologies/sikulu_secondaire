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

    public function index($token)
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($token)
    {
        $ecole = Ecole::where('token',$token)->first();
        //dd($ecole);
        $prof = Prof::where('user_id', Auth::user()->id)->first();
        $ecoles = ProfEcole::where('prof_id', $prof->id)->get();
        return view('Prof.Ecoles.show')->with(compact('ecole'));
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
