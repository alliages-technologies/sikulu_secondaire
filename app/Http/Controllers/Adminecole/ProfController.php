<?php

namespace App\Http\Controllers\Adminecole;

use redirectIlluminate\Routing\RedirectorRedirectorRedirectResponseroute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\Models\Diplome;
use Illuminate\Support\Facades\Hash;


class ProfController extends Controller
{
    public function index(){
        $profs=ProfEcole::where('ecole_id',auth()->user()->ecole_id)->get();
        return view('Adminecole.Profs.index')->with(compact('profs'));
    }

    public function create(){
        $diplomes = Diplome::all();
        return view('Adminecole.Profs.create')->with(compact('diplomes'));
    }

    /*
    Etapes de vérifications
    */

    public function verificationNumero(){
        $phone = request()->phone;
        $user = User::where('phone', $phone)->first();
        if ($user) {
            return response()->json($user);
        }
        else{
            return response()->json("SUIVANT");
        }
    }

    public function terminerUn(){
        $prof = Prof::where('user_id', request()->prof_id)->first();
        $profecole = ProfEcole::updateOrCreate([
            'prof_id' => $prof->id,
            'ecole_id' => auth()->user()->ecole_id
        ]);
        return response()->json("OK");
    }

    public function verificationInfo(){
        $nom = request()->nom;
        $prenom = request()->prenom;
        $prof = Prof::where('nom', 'like', "%{$nom}%")->where('prenom', 'like', "%{$prenom}%")->first();
        if ($prof) {
            return response()->json($prof);
        }
        else {
            return response()->json("SUIVANT");
        }
    }

    public function terminerDeux(){
        $prof = Prof::where('user_id', request()->prof_id)->first();
        if ($prof !== null){
            $prof->update([
                'nom' => request()->nom,
                'prenom' => request()->prenom,
                'adresse' => request()->adresse,
                'diplome_id' => request()->diplome
            ]);
            $profecole = ProfEcole::updateOrCreate([
                'prof_id' => $prof->id,
                'ecole_id' => auth()->user()->ecole_id
            ]);
        }
        
        return response()->json("OK");

        /*
        $prof = Prof::updateOrCreate([
            'nom' => request()->nom,
            'prenom' => request()->prenom,
            'adresse' => request()->adresse,
            'diplome_id' => request()->diplome
        ]);
        */
    }

    /*
    Fin des vérifications
    */

    public function store(){
        $nom = request()->nom;
        $prenom = request()->prenom;
        $telephone = request()->phone;
        $email = request()->email;
        $password = Hash::make(request()->password);
        $adresse = request()->adresse;
        $diplome = request()->diplome;

        $user=New User();
        $user->name= $nom.' '.$prenom;
        $user->email= $email;
        $user->phone= $telephone;
        $user->password= $password;
        $user->role_id=6;
        //$user->ecole_id = auth()->user()->ecole_id;
        $user->ecole_id = 0;
        $user->save();

        $prof = new Prof();
        $prof->user_id = $user->id;
        $prof->nom = $nom;
        $prof->prenom = $prenom;
        $prof->adresse = $adresse;
        $prof->telephone = $telephone;
        $prof->diplome_id = $diplome;
        $prof->save();

        $profecole = new ProfEcole();
        $profecole->prof_id = $prof->id;
        $profecole->ecole_id = auth()->user()->ecole_id;
        $profecole->save();

        return response()->json("OK");
    }

    public function show($id){
        $prof=Prof::find($id);
        return view('Adminecole.Profs.show')->with(compact('prof'));
    }
}
