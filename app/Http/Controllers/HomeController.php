<?php

namespace App\Http\Controllers;

use App\Models\ParentEcole;
use App\Models\Prof;
use App\Models\ProfEcole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role_id==1){
            return view('Superadmin/dashboard');
        }

        elseif(Auth::user()->role_id==2){
            return view('Adminecole/dashboard');
        }

        elseif(Auth::user()->role_id==4){
            return view('ResponsableFinances/dashboard');
        }

        elseif(Auth::user()->role_id==5){
            return view('ResponsableScolarite/dashboard');
        }

        elseif(Auth::user()->role_id==6){
            $prof = Prof::where('user_id',Auth::user()->id)->first();
            $ecoles = ProfEcole::where('prof_id',$prof->id)->get();
            return view('Prof/dashboard')->with(compact('ecoles'));
        }

        elseif(Auth::user()->role_id==7){
            $parent = User::where('id',Auth::user()->id)->first();
            $ecoles = ParentEcole::where('parent_id',$parent->id)->get();
            //dd($parent);
            return view('Parent.dashboard')->with(compact('ecoles'));
        }

        elseif(Auth::user()->role_id==8) {
            //dd(Auth::user()->id);
            return view('Surveillant.dashboard');
        }

        elseif(Auth::user()->role_id==9) {
            //dd(Auth::user()->id);
            return view('Revendeur.dashboard');
        }

        else{
            return redirect('/login');
        }


    }
}
