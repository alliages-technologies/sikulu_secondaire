<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use App\Models\Pointage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{
    public function index()
    {
        $pointages = Pointage::where('ecole_id',Auth::user()->ecole_id)->get();
        return view('Adminecole.Pointages.index')->with(compact('pointages'));
    }
    
}
