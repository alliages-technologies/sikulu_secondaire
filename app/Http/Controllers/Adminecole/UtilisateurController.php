<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index(){
        $auth=auth()->user()->ecole_id;
        $users=User::where('role_id', 4)->OrWhere('role_id', 5)->where('ecole_id', $auth)->get();
        $roles=Role::all();
        return view('Adminecole.Parametres.Utilisateurs.index')->with(compact('users', 'roles'));
    }

    public function responsableFinancesStore(){
        $auth=auth()->user()->ecole_id;
        $user=new User();
        $user->name=request()->name;
        $user->phone=request()->phone;
        $user->email=request()->email;
        $user->password=Hash::make(request()->password);
        $user->role_id=4;
        $user->ecole_id=$auth;
        $user->save();
        return redirect()->back();
    }

    public function responsableScolariteStore(){
        $auth=auth()->user()->ecole_id;
        $user=new User();
        $user->name=request()->name;
        $user->phone=request()->phone;
        $user->email=request()->email;
        $user->password=Hash::make(request()->password);
        $user->role_id=5;
        $user->ecole_id=$auth;
        $user->save();
        return redirect()->back();
    }

    public function store(){
        //
    }

    public function show($id){
        //
    }
}
