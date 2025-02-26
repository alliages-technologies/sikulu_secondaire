<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index(){
        $ecole=Auth::user()->ecole_id;
        //$users=User::where('ecole_id', 4)->OrWhere('role_id', 5)->OrWhere('role_id', $ecole)->get();
        $users = User::where('ecole_id', $ecole)->get();
        $roles = Role::all();
        return view('Adminecole.Parametres.Utilisateurs.index')->with(compact('users', 'roles'));
    }

    public function responsableStore(){
        $auth = auth()->user()->ecole_id;
        $user = new User();
        $user->name = request()->name;
        $user->phone = request()->phone;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->role_id = request()->role_id;
        $user->ecole_id = $auth;
        //dd($user);
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
