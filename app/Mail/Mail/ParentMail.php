<?php

namespace App\Mail\Mail;

use App\Models\AppuieCour;
use App\Models\ProfEcole;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ParentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];


    public function __construct(User $user)
    {
        $this->data = $user;
    }


    public function build()
    {
        $user = User::find(Auth::user()->id);
        $ecole = ProfEcole::where('prof_id',$user->prof->id)->first();

        $appuie_cour = AppuieCour::where('user_id',$user->id)->where('ecole_id',$ecole->ecole_id)->orderBy('id','desc')->first();
        //dd(base_path($appuie_cour->cours));
        return $this->  
        from($user->email)->
        view('Prof.Appuies.email')->attach(public_path($appuie_cour->cours))->with(compact('appuie_cour'));//with(compact('appuie_cour'));
    }
}
