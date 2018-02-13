<?php

namespace App\Http\Controllers;


use App\Vente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ControllerVente extends Controller
{
    public function index()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $ventes = Vente::all();
            return view('vente', compact('ventes'));
        }elseif (Gate::allows('user')){
            $ventes = Vente::where('user_id', Auth::id())->get();
            return view('vente', compact('ventes'));

        }
    }
}

?>