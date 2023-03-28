<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('perfil')->with('painelName', 'Perfil');
    }
}
