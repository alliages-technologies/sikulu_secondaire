<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Eleve;
use App\Models\Classe;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::orderBy('created_at','desc')->paginate(10);
        return view('Inscriptions/index')->with(compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Inscriptions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classes = Classe::all();
        $eleve = new Eleve();
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->date_naiss = $request->date_naiss;
        $eleve->lieu_naiss = $request->lieu_naiss;
        $eleve->adresse = $request->adresse;
        $eleve->nom_pere = $request->nom_pere;
        $eleve->tel_pere = $request->tel_pere;
        $eleve->nom_mere = $request->nom_mere;
        $eleve->tel_mere = $request->tel_mere;
        $eleve->nom_tuteur = $request->nom_tuteur;
        $eleve->tel_tuteur = $request->tel_tuteur;
        if($request->image_uri){
            $fichier = $request->image_uri;
            $ext_array= ['PNG','JPG','JPEG','GIF','jpg','png','jpeg','gif'];
            $ext = $fichier->getClientOriginalExtension();
            if (in_array($ext,$ext_array)){
                if(!file_exists(public_path().'/images')){
                    mkdir(public_path().'/images');
                }
                if(!file_exists(public_path().'/images/membres')){
                    mkdir(public_path().'/images/membres');
                }

                $name = date('dmYhis').'.'.$ext;
                $path = 'images/membres/'. $name;
                $fichier->move(public_path('images/membres'),$name);
                $eleve->image_uri = $path;
            }
        }
        //dd($eleve);
        $eleve->save();
        return view('Inscriptions/inscrire')->with(compact('eleve','classes'));
    }

    public function inscrit(Request $request)
    {
        $inscription = new Inscription();
        $inscription->eleve_id = $request->eleve_id;
        $inscription->user_id = Auth::user()->id;
        $inscription->montant_inscri = $request->montant_inscri;
        $inscription->montant_frais = $request->montant_frais;
        $inscription->classe_id = $request->classe_id;
        //dd($inscription);
        $inscription->save();
        return redirect('/inscriptions');
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
