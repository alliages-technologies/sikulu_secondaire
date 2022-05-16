<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorieDepense;

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
        return view('Adminecole.Finances.Depenses.gestion');
    }

    /*
        Fin de la gestion des dépenses
    */
}
