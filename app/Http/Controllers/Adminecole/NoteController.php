<?php

namespace App\Http\Controllers\Adminecole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function index(){

        return view('Adminecole.Notes.index');
    }
}
