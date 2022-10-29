<?php

namespace App\Mail\Mail;

use App\Models\Ecolage;
use App\Models\Moi;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PaiementMail extends Mailable
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
        $ecolage = Ecolage::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->first();
        $mois = Moi::where('id',$ecolage->mois)->first();
        $ecolage = Ecolage::where('ecole_id',Auth::user()->ecole_id)->orderBy('id','desc')->first();
        $ecolages = Ecolage::where('ecole_id',Auth::user()->ecole_id)->where('inscription_id',$ecolage->inscription_id)->get();
        //dd($ecolage->inscription->eleve);
        $totalverse = $ecolages->reduce(function ($carry, $item) {
            return $carry + $item->montant;
        });
        $totalannuel = $ecolage->inscription->montant_inscri * 9;
        $reste_a_payer = $totalannuel-$totalverse;
        return $this->
        from($user->email)->
        view('ResponsableFinances.Finances.Ecolages.email')->with(compact('ecolage','mois','reste_a_payer','totalannuel','totalverse'));
    }
}
