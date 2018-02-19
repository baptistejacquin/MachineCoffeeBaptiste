<?php

namespace App\Http\Controllers;


use App\Vente;
use App\Boisson;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ControllerVente extends Controller
{


// fonction pour afficher la liste des ventes
    public function index()
    {
//voir toutes les ventes si admin ou super admin
        if (Gate::allows('adminSuperAdmin')) {
            $ventes = Vente::select()->orderby("created_at", "DESC")->get();
            return view('vente', compact('ventes'));

//voir juste les recettes du user connecté
        } elseif (Gate::allows('user')) {
            $ventes = Vente::where('user_id', Auth::id())->orderby("created_at", "DESC")->get();
            return view('vente', compact('ventes'));

        }
    }


    public function trier()
    {
        $idboisson = Boisson::select('id')->where('nom', request("searchVente"))->get()->first();
        $users = User::select('id')->where("name", request("searchVente"))->get()->first();
        if ($idboisson) {
            $ventes = Vente::where('boisson_id', $idboisson->id)->orderby("created_at", "DESC")->get();
            return view('vente', compact('ventes'));

        }else if ($users) {
            $ventes = Vente::where('user_id', $users->id)->orderby("created_at", "DESC")->get();
            return view('vente', compact('ventes'));

        } else {
            return redirect()->back()->with('error', "La rechercher ne correspond à rien");
        }
    }
}

?>