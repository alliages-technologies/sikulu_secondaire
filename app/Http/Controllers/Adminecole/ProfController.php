<?php

namespace App\Http\Controllers\Adminecole;

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

    public function store(){
        $user=New User();
        $user->name=request()->name;
        $user->email=request()->email;
        $user->phone=request()->phone;
        $user->password=request()->password;
        $user->role_id=6;
        //$user->ecole_id=auth()->user()->ecole_id;
        //dd($user);
        $user->save();
        $prof=new Prof();
        $prof->user_id=$user->id;
        $prof->nom=$user->name;
        $prof->telephone=$user->phone;
        $prof->save();
    }
}
