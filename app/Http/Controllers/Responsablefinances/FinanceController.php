<?php

namespace App\Http\Controllers\Responsablefinances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorieDepense;
use App\Models\CategorieEntree;
use App\Models\Depense;
use App\Models\Entree;
use App\Models\SuiviPaiement;

class FinanceController extends Controller
{
    public function index(){
        return  view('Responsablefinances.dashboard');
    }


    /*
    Gestion des dépenses
    */

    public function depensesCategories(){
        $auth=auth()->user()->ecole_id;
        $categories_depenses=CategorieDepense::where('ecole_id', $auth)->paginate(15);
        return view('Responsablefinances.Finances.Depenses.index')->with(compact('categories_depenses'));
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
        return view('Responsablefinances.Finances.Depenses.gestion')->with(compact('categories', 'depenses'));
    }

    public function depenseStore(){
        $auth_id=auth()->user()->id;
        $ecole=auth()->user()->ecole_id;

        $depense = new Depense();
        $depense->name = request()->name;
        $depense->categorie_id = request()->categorie_id;
        $depense->montant = request()->montant;
        $depense->description = request()->description;
        $depense->ecole_id = $ecole;
        $depense->user_id = $auth_id;
        $depense->semaine = date('W');
        $depense->mois = date('n');
        $depense->annee = date('Y');
        $depense->active = 1;
        $depense->token = sha1((date('ymdhisW'))."A-depense-x".(date('ymdhisW')));
        $depense->save();

        $suivi=new SuiviPaiement();
        $suivi->paiement_id=$depense->id;
        $suivi->type="DEPENSE";
        $suivi->ecole_id=$ecole;
        $suivi->semaine = $depense->semaine;
        $suivi->mois = $depense->mois;
        $suivi->annee = $depense->annee;
        $suivi->token = sha1((date('ymdhisW'))."A-suiviDepense-x".(date('ymdhisW')));
        $suivi->save();

        return redirect()->back();
    }

    public function depenseShow($token){
        $depense=Depense::where('token', $token)->first();
        return view('Responsablefinances.Finances.Depenses.show')->with(compact('depense'));
    }


    /*
    Gestion des entrées
    */

    public function entrees(){
        $auth=auth()->user()->ecole_id;
        $categories_entrees=CategorieEntree::where('ecole_id', $auth)->paginate(15);
        return view('Responsablefinances.Finances.Entrees.index')->with(compact('categories_entrees'));
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
        return view('Responsablefinances.Finances.Entrees.gestion')->with(compact('categories', 'entrees'));
    }

    public function entreeStore(){
        $auth_id=auth()->user()->id;
        $ecole=auth()->user()->ecole_id;
        $entree = new Entree();
        $entree->name = request()->name;
        $entree->categorie_id = request()->categorie_id;
        $entree->montant = request()->montant;
        $entree->description = request()->description;
        $entree->ecole_id = $ecole;
        $entree->user_id = $auth_id;
        $entree->semaine = date('W');
        $entree->mois = date('n');
        $entree->annee = date('Y');
        $entree->active = 1;
        $entree->token = sha1((date('ymdhisW'))."A-entree-x".(date('ymdhisW')));
        $entree->save();

        $suivi=new SuiviPaiement();
        $suivi->paiement_id=$entree->id;
        $suivi->type="AUTRE ENTREE";
        $suivi->ecole_id=$ecole;
        $suivi->semaine = $entree->semaine;
        $suivi->mois = $entree->mois;
        $suivi->annee = $entree->annee;
        $suivi->token = sha1((date('ymdhisW'))."A-suiviEntree-x".(date('ymdhisW')));
        $suivi->save();

        return redirect()->back();
    }

    public function entreeShow($token){
        $entree=Entree::where('token', $token)->first();
        return view('Responsablefinances.Finances.Entrees.show')->with(compact('entree'));
    }
}
