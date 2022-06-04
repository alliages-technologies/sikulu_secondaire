<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\ParentEcole;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{

    public function index()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id', $annee_acad->id)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
        return view('Responsablescolarite.Inscriptions.index')->with(compact('inscriptions'));
    }


    public function create()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Responsablescolarite.Inscriptions.create')->with(compact('annee_acad','salles'));
    }

    public function verificationNumero(){
        $name = request()->nom;
        $phone = request()->phone;
        $user = User::where('phone', $phone)->where('name','like',"%{$name}%")->first();
        if ($user) {
            return response()->json($user);
        }
        else{
            return response()->json("il n'existe pas ");
        }
    }

    public function store(Request $request)
    {
        $salle = Salle::find($request->salle_id);
        $name = request()->nom_tuteur;
        $phone = request()->tel_tuteur;
        $parent = User::where('phone', $phone)->where('name','like',"%{$name}%")->first();

        // Cas où le parent existe
        if ($parent) {
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
            $inscription->classe_id = $salle->classe_id;
            $inscription->annee_id = $request->annee_id;
            $inscription->salle_id = $salle->id;
            $inscription->moi_id = date('m');
            $inscription->semaine_id = date('W');
            $inscription->token = sha1("Token".date('Ymdhis').date('Ymdhis'));
            $inscription->save();


        }
        // Cas où le parent n'existe pas
        else{
            $parent = new User();
            $parent->name = $request->nom_tuteur;
            $parent->phone = $request->tel_tuteur;
            $parent->email = $request->email;
            $parent->password = Hash::make($request->password);
            $parent->role_id = 7;
            $parent->ecole_id = Auth::user()->ecole_id;
            $parent->save();
            $parent_ecole = new ParentEcole();
            $parent_ecole->ecole_id = Auth::user()->ecole_id;
            $parent_ecole->parent_id = $parent->id;
            $parent_ecole->save();

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
            $inscription->classe_id = $salle->classe_id;
            $inscription->annee_id = $request->annee_id;
            $inscription->salle_id = $salle->id;
            $inscription->moi_id = date('m');
            $inscription->semaine_id = date('w');
            $inscription->token = sha1("Token".date('Ymdhis').date('Ymdhis'));
            $inscription->save();
        }

        return redirect('/responsablescolarite/inscriptions');
    }


    public function reinscription(){
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        return view('Responsablescolarite.Inscriptions.reinscription')->with(compact('salles','annee_acad'));
    }

    public function getInscriptionById($id){
        $inscriptions = Inscription::where('salle_id',$id)->get();
        return response()->json($inscriptions);
    }

    public function save(){
        $inscription_id = request()->inscription_id;
        $montant = request()->montant_inscri;
        $inscription_recent = Inscription::find($inscription_id);
        $salle = request()->salle_id;
        $salle = Salle::find($salle);

        $inscription = new Inscription();
        $inscription->eleve_id = $inscription_recent->eleve_id;
        $inscription->user_id = Auth::user()->id;
        $inscription->montant_inscri = $montant;

        $inscription->classe_id = $salle->classe_id;
        $inscription->annee_id = request()->annee_id;
        $inscription->salle_id = $salle->id;
        $inscription->moi_id = date('m');
        $inscription->semaine_id = date('w');
        $inscription->token = sha1("Token".date('Ymdhis').date('Ymdhis'));
        $inscription->parent_id = $inscription_recent->id;
        $inscription->save();
        return response()->json("OK");
    }

    public function show($token)
    {
        $inscription = Inscription::where('token', $token)->first();
        return view('Responsablescolarite.Inscriptions.show')->with(compact('inscription'));
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
