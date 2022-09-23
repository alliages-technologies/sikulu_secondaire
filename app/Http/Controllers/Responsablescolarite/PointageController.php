<?php

namespace App\Http\Controllers\Responsablescolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointageController extends Controller
{
    
    public function index()
    {
        return view('ResponsableScolarite.Pointages.index');
    }

}
