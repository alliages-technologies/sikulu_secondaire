<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorieDepense;
use App\Models\CategorieEntree;
use App\Models\Depense;
use App\Models\Entree;
use Illuminate\Support\Facades\Hash;

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
        $depenses = Depense::where('ecole_id', $auth)->orderBy('created_at', 'desc')->paginate(15);
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
        $depense->token = "A".(date('ymdhisW')).(date('ymdhisW'))."x";
        $depense->save();
        return redirect()->back();
    }

    public function depenseShow($token){
        $depense=Depense::where('token', $token)->first();
        return view('Adminecole.Finances.Depenses.show')->with(compact('depense'));
    }


    /*
    Gestion des entrées
    */

    public function entrees(){
        $categories_entrees=CategorieEntree::all();
        return view('Adminecole.Finances.Entrees.index')->with(compact('categories_entrees'));
    }

    public function entreeCategorieStore(){
        $auth=auth()->user()->ecole_id;
        $catEntree = new CategorieEntree();
        $catEntree->name=request()->name;
        $catEntree->ecole_id=$auth;
        $catEntree->save();
        return redirect()->back();
    }

    public function entreesGestion(){
        $auth=auth()->user()->ecole_id;
        $categories = CategorieEntree::where('ecole_id', $auth)->get();
        $entrees = Entree::where('ecole_id', $auth)->orderBy('created_at', 'desc')->paginate(15);
        return view('Adminecole.Finances.Entrees.gestion')->with(compact('categories', 'entrees'));
    }

    public function entreeStore(){
        $auth_id=auth()->user()->id;
        $auth=auth()->user()->ecole_id;
        $entree = new Entree();
        $entree->name = request()->name;
        $entree->categorie_id = request()->categorie_id;
        $entree->montant = request()->montant;
        $entree->description = request()->description;
        $entree->ecole_id = $auth;
        $entree->user_id = $auth_id;
        $entree->semaine = date('W');
        $entree->mois = date('n');
        $entree->annee = date('Y');
        $entree->active = 1;
        $entree->token = "A".date('ymdhisW').date('ymdhisW')."x";
        $entree->save();
        return redirect()->back();
    }

    public function entreeShow($token){
        $entree=Entree::where('token', $token)->first();
        return view('Adminecole.Finances.Entrees.show')->with(compact('entree'));
    }
}
