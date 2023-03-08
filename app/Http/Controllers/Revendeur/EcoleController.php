<?php

namespace App\Http\Controllers\Revendeur;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\Trimestre;
use App\Models\TrimestreEcole;
use App\Models\TypeEnseignement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EcoleController extends Controller
{

    public function index()
    {
        $ecoles = Ecole::where('revendeur_id',Auth::user()->id)->get();
        $enseignements = TypeEnseignement::all();
        return view('Revendeur.Ecoles.index')->with(compact('ecoles','enseignements'));
    }

    public function store()
    {
        $ecole=new Ecole();
        $ecole->name=request()->name;
        $ecole->address=request()->address;
        $ecole->email=request()->email;
        $ecole->phone=request()->phone;
        $ecole->coordonnees=request()->coordonnees;
        $ecole->enseignement_id=request()->enseignement_id;
        $ecole->revendeur_id = Auth::user()->id;
        //dd($ecole);
        //$imagePath=request('image_uri')->store('images-ecoles', 'public');
        $ecole->token = "TokeNecOlE".date('Ymd').date('Ymdhms');
        if (request()->image_uri) {
         $fichier = request()->image_uri;
         $ext_array = ['PNG', 'JPG', 'JPEG', 'GIF', 'jpg', 'png', 'jpeg', 'gif'];
         $ext = $fichier->getClientOriginalExtension();
         if (in_array($ext, $ext_array)) {
             if (!file_exists(public_path() . '/images')) {
                 mkdir(public_path() . '/images');
             }
             if (!file_exists(public_path() . '/images/ecoles')) {
                 mkdir(public_path() . '/images/ecoles');
             }

             $name = date('dmYhis') . '.' . $ext;
             $path = 'images/ecoles/' . $name;
             $fichier->move(public_path('images/ecoles'), $name);
             $ecole->image_uri = $path;
         }
     }
        $ecole->save();
        // Configuration de l'admin de l'école
        $admin=new User();
        $admin->name=request()->admin_name;
        $admin->email=request()->admin_email;
        $admin->password=Hash::make(request()->admin_password);
        $admin->role_id=2;
        $admin->ecole_id=$ecole->id;
        $admin->save();
        // Parametrage des trimestres
        $trimestres = Trimestre::all();
        foreach ($trimestres as $trimestre){
            $trimestre_ecole = new TrimestreEcole();
            $trimestre_ecole->ecole_id = $ecole->id;
            $trimestre_ecole->trimestre_id = $trimestre->id;
            //dd($trimestre_ecole);
            $trimestre_ecole->save();
        }
        return redirect()->back();
    }

}
