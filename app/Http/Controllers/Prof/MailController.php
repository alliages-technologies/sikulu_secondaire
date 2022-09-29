<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Mail\Mail\ParentMail;
use App\Models\AppuieCour;
use App\Models\Inscription;
use App\Models\ProfEcole;
use App\Models\ProgrammeEcoleLigne;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{

    public function cour(){
        $user = User::find(Auth::user()->id);
        $ecole = ProfEcole::where('prof_id',$user->prof->id)->first();
        $appuie_cours = AppuieCour::where('user_id',$user->id)->where('ecole_id',$ecole->ecole_id)->orderBy('id','desc')->paginate(10);
        //$pel = ProgrammeEcoleLigne::find($appuie_cour->programme_ecole_ligne_id)->programmeecole->salle->id;
        $prof_ecole = ProfEcole::where('prof_id',Auth::user()->prof->id)->first();
        $pels = ProgrammeEcoleLigne::where('enseignant_id',$prof_ecole->prof_id)->get();
        return view('Prof.Appuies.cours')->with(compact('pels','appuie_cours'));
    }

    public function bar(){
        $objet = request()->objet;
        $cours = request()->cours;
        $programme_ecole_ligne_id = request()->programme_ecole_ligne_id;
        $user = User::find(Auth::user()->id);
        //dd($user->prof->id);
        $ecole = ProfEcole::where('prof_id',$user->prof->id)->first();
        $appuie_cour = new AppuieCour();
        $appuie_cour->objet = $objet;
        $appuie_cour->user_id = $user->id;
        $appuie_cour->ecole_id = $ecole->ecole_id;
        $appuie_cour->programme_ecole_ligne_id = $programme_ecole_ligne_id;
         if ($cours) {
            $fichier = $cours;
            $ext_array = ['PNG', 'JPG', 'JPEG', 'GIF', 'jpg', 'png', 'jpeg', 'gif','PDF','pdf'];
            $ext = $fichier->getClientOriginalExtension();
            if (in_array($ext, $ext_array)) {
                if (!file_exists(public_path() . '/cours')) {
                    mkdir(public_path() . '/cours');
                }
                if (!file_exists(public_path() . '/cours')) {
                    mkdir(public_path() . '/cours');
                }

                $name = date('dmYhis') . '.' . $ext;
                $path = 'cours/' . $name;
                $fichier->move(public_path('cours/'), $name);
                $appuie_cour->cours = $path;
            }
        }
        //dd($appuie_cour);
        //$appuie_cour->cours = $cours;
        $appuie_cour->save();
        $profs = User::where('role_id',6)->get();


        $appuie_cour = AppuieCour::where('user_id',$user->id)->where('ecole_id',$ecole->ecole_id)->orderBy('id','desc')->first();
        $pel = ProgrammeEcoleLigne::find($appuie_cour->programme_ecole_ligne_id)->programmeecole->salle->id;

        $inscriptions = Inscription::where('salle_id',$pel)->get();
        foreach ($inscriptions as $inscription) {
            Mail::to($inscription->eleve->email_tuteur)->send(new ParentMail($user));
        }
        request()->session()->flash('info',' méssage envoyé avec succèss !!!');
        return redirect()->back();
    }
}
