<?php

namespace App\Http\Controllers\Adminecole;

use redirectIlluminate\Routing\RedirectorRedirectorRedirectResponseroute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Prof;

class ProfController extends Controller
{
    public function index(){
        $users=User::all();
        $profs=Prof::all();
        return view('Adminecole.Profs.index')->with(compact('profs', 'users'));
    }

    public function create(){
        return view('Adminecole.Profs.create');
    }

    public function store(){
        $user=New User();
        $user->name=request()->name;
        $user->email=request()->email;
        $user->phone=request()->phone;
        $user->password=request()->password;
        $user->role_id=6;
        //$user->ecole_id=auth()->user()->ecole_id;
        $request = User::where('name', request('name'))->orWhere('phone', request('phone'))->first();
            if ($request !== null) {
                return response('Données existantes');
            } else {
                $user->save();
                $prof=new Prof();
                $prof->user_id=$user->id;
                $prof->nom=$user->name;
                $prof->telephone=$user->phone;
                $prof->save();
            }
        return redirect()->back();
    }

    public function show($id){
        $prof=Prof::find($id);
        return view('Adminecole.Profs.show')->with(compact('prof'));
    }
}
