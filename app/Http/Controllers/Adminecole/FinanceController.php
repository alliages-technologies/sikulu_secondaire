<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorieDepense;
use App\Models\Depense;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class FinanceController extends Controller
{
    public function index(){
        return  view('Adminecole.Finances.index');
    }

    /*
    Gestion des dépenses
    */

    public function depensesCategories(){
        $auth=auth()->user()->ecole_id;
        $categories_depenses=CategorieDepense::where('ecole_id', $auth)->paginate(15);
        return view('Adminecole.Finances.Depenses.index')->with(compact('categories_depenses'));
    }

    public function depenseCategorieStore(){
        $auth=auth()->user()->ecole_id;
        $catDepense = new CategorieDepense();
        $catDepense->name=request()->name;
        $catDepense->ecole_id=$auth;
        $catDepense->save();
        return redirect()->back();
    }

    public function depensesGestion(){
        $auth=auth()->user()->ecole_id;
        $categories = CategorieDepense::where('ecole_id', $auth)->get();
        $depenses = Depense::where('ecole_id', $auth)->paginate(15);
        return view('Adminecole.Finances.Depenses.gestion')->with(compact('categories', 'depenses'));
    }

    public function depenseStore(){
        $auth_id=auth()->user()->id;
        $auth=auth()->user()->ecole_id;
        $depense = new Depense();
        $depense->name = request()->name;
        $depense->categorie_id = request()->categorie_id;
        $depense->montant = request()->montant;
        $depense->description = request()->description;
        $depense->ecole_id = $auth;
        $depense->user_id = $auth_id;
        $depense->semaine = date('W');
        $depense->mois = date('n');
        $depense->annee = date('Y');
        $depense->active = 1;
        $depense->token = "A".(date('ymdhis'))."x";
        //dd($depense);
        $depense->save();
        return redirect()->back();
    }

    public function depenseShow($token){
        $depense=Depense::where('token', $token)->first();
        //dd($depense);
        return view('Adminecole.Finances.Depenses.show')->with(compact('depense'));
    }

    /*
    Fin de la gestion des dépenses
    */
}
