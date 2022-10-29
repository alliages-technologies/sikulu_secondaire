<?php

namespace App\Mail\Mail;

use App\Models\ProfEcole;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AbscenceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(Auth::user()->id);
        $prof_ecole = ProfEcole::where('prof_id',$user->prof->id)->first();

        return $this->
        from($user->email)->
        view('Prof.Abscences.email')->with(compact('user'));
    }
}
