<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RevendeurController extends Controller
{

    public function index()
    {
        $revendeurs = User::where('role_id',9)->get();
        return view('Superadmin.Revendeur.index')->with(compact('revendeurs'));
    }

    public function store()
    {
        $revendeur = new User();
        $revendeur->name = request()->name;
        $revendeur->phone = request()->phone;
        $revendeur->email = request()->email;
        $revendeur->role_id = 9;
        $revendeur->actif = 1;
        $revendeur->password = Hash::make(request()->password);
        //dd($revendeur);
        $revendeur->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $revendeur = User::find($id);
        return view('Superadmin.Revendeur.show')->with(compact('revendeur'));
    }

}
