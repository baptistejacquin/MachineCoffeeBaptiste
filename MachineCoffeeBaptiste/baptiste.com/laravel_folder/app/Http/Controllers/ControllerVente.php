<?php

namespace App\Http\Controllers;


use App\Vente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ControllerVente extends Controller
{


// fonction pour afficher la liste des ventes
    public function index()
    {
//voir toutes les ventes si admin ou super admin
        if (Gate::allows('adminSuperAdmin')) {
            $ventes = Vente::all();
            return view('vente', compact('ventes'));

//voir juste les recettes du user connecté
        } elseif (Gate::allows('user')) {
            $ventes = Vente::where('user_id', Auth::id())->get();
            return view('vente', compact('ventes'));

        }
    }
}

?>