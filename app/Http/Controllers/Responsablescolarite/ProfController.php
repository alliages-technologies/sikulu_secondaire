<?php

namespace App\Http\Controllers\Responsablescolarite;

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
        $prof_ecole=ProfEcole::where('ecole_id',auth()->user()->ecole_id)->orderBy('created_at', 'asc')->paginate(15);
        return view('Responsablescolarite.Profs.index')->with(compact('prof_ecole'));
    }

    public function create(){
        $diplomes = Diplome::all();
        return view('Responsablescolarite.Profs.create')->with(compact('diplomes'));
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
        $prof = Prof::where('id', request()->prof_id)->first();
        $prof->adresse=request()->adresse;
        $prof->diplome_id=request()->diplome;
        $prof->update();

        $profecole = ProfEcole::updateOrCreate([
            'prof_id' => $prof->id,
            'ecole_id' => auth()->user()->ecole_id
        ]);

        return response()->json("OK");
    }

    /*
    Fin des vérifications
    */

    public function store(Request $request){
        $user=New User();
        $user->name= request()->nom.' '.request()->prenom;
        $user->email= request()->email;
        $user->phone= request()->phone;
        $user->password= Hash::make(request()->password);
        $user->role_id=6;
        $user->ecole_id = 0;
        $user->save();

        $prof = new Prof();
        $prof->user_id = $user->id;
        $prof->nom = request()->nom;
        $prof->prenom = request()->prenom;
        $prof->date_naiss = request()->date_naiss;
        $prof->lieu_naiss = request()->lieu_naiss;
        $prof->adresse = request()->adresse;
        $prof->telephone = $user->phone;
        $prof->diplome_id = request()->diplome_id;
        if ($request->image) {
            $fichier = $request->image;
            $ext_array = ['PNG', 'JPG', 'JPEG', 'GIF', 'jpg', 'png', 'jpeg', 'gif'];
            $ext = $fichier->getClientOriginalExtension();
            if (in_array($ext, $ext_array)) {
                if (!file_exists(public_path() . '/images')) {
                    mkdir(public_path() . '/images');
                }
                if (!file_exists(public_path() . '/images/profs')) {
                    mkdir(public_path() . '/images/profs');
                }

                $name = date('dmYhis') . '.' . $ext;
                $path = 'images/profs/' . $name;
                $fichier->move(public_path('images/profs'), $name);
                $prof->image = $path;
            }
        }
        $prof->token = sha1(date('ymdhisW')."Ax".date('Wsihdmy'));
        $prof->save();

        $profecole = new ProfEcole();
        $profecole->prof_id = $prof->id;
        $profecole->ecole_id = auth()->user()->ecole_id;
        $profecole->save();

        return redirect()->route('responsablescolarite.profs.index');
    }

    public function show($token){
        $prof=Prof::where('token', $token)->first();
        return view('Responsablescolarite.Profs.show')->with(compact('prof'));
    }
}
