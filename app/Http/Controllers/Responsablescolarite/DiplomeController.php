<?php

namespace App\Http\Controllers\ResponsableScolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diplome;
use Illuminate\Support\Facades\Auth;

class DiplomeController extends Controller
{

    public function index()
    {
        $diplomes = Diplome::where('ecole_id',Auth::user()->ecole_id)->orderBy('created_at', 'desc')->paginate(8);
        return view('ResponsableScolarite.Diplomes.index')->with(compact('diplomes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $diplome = new Diplome();
        $diplome->name = $request->name;
        $diplome->ecole_id = Auth::user()->ecole_id;
        //dd($diplome);
        $diplome->save();
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
