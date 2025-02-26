<?php

namespace App\Http\Controllers\ResponsableScolarite;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcad;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\ParentEcole;
use App\Models\Salle;
use App\Models\Sexe;
use App\Models\SuiviPaiement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class InscriptionController extends Controller
{

    public function index()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $inscriptions = Inscription::where('annee_id', $annee_acad->id)->where('ecole_id', Auth::user()->ecole_id)->orderBy('created_at', 'desc')->get();
        return view('ResponsableScolarite.Inscriptions.index')->with(compact('inscriptions'));
    }

    public function inscriptionSalle()
    {
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('ResponsableScolarite.Inscriptions.salle')->with(compact('salles'));
    }

    public function inscriptionSalleId($salle)
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $salle = Salle::where('token',$salle)->first();
        $inscriptions = Inscription::where('annee_id',$annee_acad->id)->where('salle_id',$salle->id)->orderBy('id','desc')->paginate(20);
        return view('ResponsableScolarite.Inscriptions.salle_show')->with(compact('salle','inscriptions'));
    }

    public function create()
    {
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        $salles = Salle::where('ecole_id', Auth::user()->ecole_id)->get();
        $sexes = Sexe::all();
        return view('ResponsableScolarite.Inscriptions.create')->with(compact('annee_acad','salles','sexes'));
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
            //dd($parent);
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
            $eleve->email_tuteur = $request->email;
            $eleve->sexe_id = $request->sexe_id;
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
            $inscription->ecole_id = Auth::user()->ecole_id;
            $inscription->montant_inscri = $request->montant_inscri;
            $inscription->montant_frais = $request->montant_frais;
            $inscription->classe_id = $salle->classe_id;
            $inscription->annee_id = $request->annee_id;
            $inscription->salle_id = $salle->id;
            $inscription->moi_id = date('n');
            $inscription->semaine_id = date('W');
            $inscription->token = sha1("Inscription".date('Ymdhis').date('Ymdhis'));
            if ($request->reinscription_id == null) {
                $inscription->reinscription_id = 0;
            }
            else {
                $inscription->reinscription_id = 1;
            }
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
            $eleve->email_tuteur = $request->email;
            $eleve->sexe_id = $request->sexe_id;
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
            $inscription->ecole_id = Auth::user()->ecole_id;
            $inscription->parent_id = $parent->id;
            $inscription->montant_inscri = $request->montant_inscri;
            $inscription->montant_frais = $request->montant_frais;
            $inscription->classe_id = $salle->classe_id;
            $inscription->annee_id = $request->annee_id;
            $inscription->salle_id = $salle->id;
            $inscription->moi_id = date('m');
            $inscription->semaine_id = date('W');
            $inscription->token = sha1("Inscription".date('Ymdhis').date('Ymdhis'));
            if ($request->reinscription_id == null) {
                $inscription->reinscription_id = 0;
            }
            else {
                $inscription->reinscription_id = 1;
            }
            $inscription->save();
        }
        $suivi=new SuiviPaiement();
        $suivi->paiement_id=$inscription->id;
        $suivi->type="INSCRIPTION";
        $suivi->ecole_id=Auth::user()->ecole_id;
        $suivi->semaine = date('W');
        $suivi->mois = date('n');
        $suivi->annee = date('Y');
        $suivi->token = sha1((date('ymdhisW'))."A-suiviEcolage-x".(date('ymdhisW')));
        $suivi->save();

        return redirect('/responsablescolarite/inscriptions');
    }


    public function reinscription(){
        $salles = Salle::where('ecole_id', Auth::user()->ecole_id)->get();
        $annee_acad = AnneeAcad::where('actif', 1)->first();
        return view('ResponsableScolarite.Inscriptions.reinscription')->with(compact('salles','annee_acad'));
    }

    public function getInscriptionById($id){
        $inscriptions = Inscription::where('salle_id' ,$id)->get();
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
        $inscription->ecole_id = Auth::user()->ecole_id;
        $inscription->montant_inscri = $montant;

        $inscription->classe_id = $salle->classe_id;
        $inscription->annee_id = request()->annee_id;
        $inscription->salle_id = $salle->id;
        $inscription->moi_id = date('m');
        $inscription->semaine_id = date('w');
        $inscription->token = sha1("Inscription".date('Ymdhis').date('Ymdhis'));
        $inscription->parent_id = $inscription_recent->id;

        $inscription->save();

        return response()->json("OK");
    }

    public function show($token)
    {
        $inscription = Inscription::where('token', $token)->first();
        return view('ResponsableScolarite.Inscriptions.show')->with(compact('inscription'));
    }


    public function edit($id)
    {
        $inscription = Inscription::find($id);
        //dd($inscription->eleve);
        $salles = Salle::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('ResponsableScolarite.Inscriptions.edit')->with(compact('inscription','salles'));
    }


    public function update(Request $request, $id)
    {
        $inscription = Inscription::find($id);
        $inscription->montant_inscri = $request->montant_inscri;
        $inscription->montant_frais = $request->montant_frais;
        $inscription->salle_id = $request->salle_id;
        $classe = Classe::find($inscription->salle->classe->id);
        $inscription->classe_id = $classe->id;
        //dd($inscription);
        $inscription->save();
        $eleve = Eleve::find($inscription->eleve_id);
        $tuteur = User::where('email',$eleve->email_tuteur)->first();
        $tuteur->name = $request->nom_tuteur;
        $tuteur->email = $request->email_tuteur;
        $tuteur->phone = $request->tel_tuteur;
        if ($request->password) {
            $tuteur->password = Hash::make($request->password);
        }
        $tuteur->save();
        //dd($eleve->email_tuteur);

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
        $eleve->email_tuteur = $request->email_tuteur;

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
        return redirect()->back();
        //return redirect(route('responsablescolarite.inscriptions.show', $inscription->token));
    }



    public function destroy($id)
    {
        //
    }

    public function inscriptionAuto(Faker $fake){
        /* for ($i=0; $i < 10; $i++) {
        $parent = new User();
        $parent->name = $fake->lastName;
        $parent->phone = $fake->phoneNumber;
        $parent->email = $fake->email;
        $parent->password = Hash::make('parent');
        $parent->role_id = 7;
        $parent->save();
        $eleve = new Eleve();
        $eleve->nom = $parent->name;
        $eleve->prenom = $fake->firstName;
        $eleve->date_naiss = $fake->date;
        $eleve->lieu_naiss = $fake->country;
        $eleve->adresse = $fake->city;
        $eleve->nom_pere = $fake->lastName;
        $eleve->tel_pere = $fake->phoneNumber;
        $eleve->nom_mere = $fake->lastName;
        $eleve->tel_mere = $fake->phoneNumber;
        $eleve->nom_tuteur = $parent->name;
        $eleve->tel_tuteur = $parent->phone;
        $eleve->save();
        $inscription = new Inscription();
        $inscription->eleve_id = $eleve->id;
        $inscription->user_id = Auth::user()->id;
        $inscription->montant_inscri = 15000;
        $inscription->montant_frais = 0;
        $inscription->annee_id = 1;
        $inscription->moi_id = date('m');
        $inscription->semaine_id = date('w');
        $inscription->token = sha1("Token".date('Ymdhis').date('Ymdhis'));
        $inscription->classe_id = 6;
        $inscription->salle_id = 3;
        $inscription->ecole_id = Auth::user()->ecole_id;
        //dd($inscription);
        $inscription->save();
    }
    */

        $inscriptions = Inscription::all();
        foreach ($inscriptions as $inscription) {
            $user = User::where('name',$inscription->eleve->nom_tuteur)->get();
            dd($user);
        }
        return redirect()->back();
    }

}
