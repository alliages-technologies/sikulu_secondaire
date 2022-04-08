<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\AnneeAcad;
use Illuminate\Support\Facades\Auth;
use PDF;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annee_acads = AnneeAcad::where('actif', 1)->get();
        foreach ($annee_acads as $annee_acad) {
            $inscriptions = Inscription::where('anneeacad_id', $annee_acad->id)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('Admin/Inscriptions/index')->with(compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $annee_acad = AnneeAcad::where('actif', 1)->get();
        return view('Admin/Inscriptions/create')->with(compact('classes', 'annee_acad'));
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
        if ($request->image_uri) {
            $fichier = $request->image_uri;
            $ext_array = ['PNG', 'JPG', 'JPEG', 'GIF', 'jpg', 'png', 'jpeg', 'gif'];
            $ext = $fichier->getClientOriginalExtension();
            if (in_array($ext, $ext_array)) {
                if (!file_exists(public_path() . '/images')) {
                    mkdir(public_path() . '/images');
                }
                if (!file_exists(public_path() . '/images/membres')) {
                    mkdir(public_path() . '/images/membres');
                }

                $name = date('dmYhis') . '.' . $ext;
                $path = 'images/membres/' . $name;
                $fichier->move(public_path('images/membres'), $name);
                $eleve->image_uri = $path;
            }
        }
        //dd($eleve);
        $eleve->save();
        $inscription = new Inscription();
        $inscription->eleve_id = $eleve->id;
        $inscription->user_id = Auth::user()->id;
        $inscription->montant_inscri = $request->montant_inscri;
        if (!$request->montant_frais) {
            $inscription->montant_frais = 0;
        } else {

            $inscription->montant_frais = $request->montant_frais;
        }
        $inscription->classe_id = $request->classe_id;
        $inscription->anneeacad_id = $request->anneeacad_id;
        $inscription->moi_id = date('m');
        $inscription->semaine_id = date('w');
        //dd($inscription);
        $inscription->save();
        //$pdf = PDF::loadView('/Inscriptions/pdf',compact('eleve','inscription'));
        //return $pdf->stream('inscription'.$inscription->id.'.pdf');
        return view('Admin.Inscriptions.pdf')->with(compact('eleve', 'inscription'));
    }

    public function creationPdf($eleve, $inscription)
    {
        $eleve = Eleve::find($eleve);
        $inscription = Inscription::find($inscription);
        $pdf = PDF::loadView('Admin/Inscriptions/pdf', compact('eleve', 'inscription'));
        //set_time_limit(300);
        return $pdf->download('pdf_file.pdf');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscription = Inscription::find($id);
        return view('Admin/Inscriptions/show')->with(compact('inscription'));
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
