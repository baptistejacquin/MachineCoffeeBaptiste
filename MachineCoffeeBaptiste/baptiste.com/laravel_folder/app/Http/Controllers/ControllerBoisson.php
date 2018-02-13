<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoissonRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Boisson;
use App\Recette;
use Illuminate\Support\Facades\Gate;

class ControllerBoisson extends Controller
{


// Fonction pour afficher le formulaire de création de boisson
    public function ajout()
    {
        if (Gate::allows('adminSuperAdmin')) {
            return view('boissonRecette');
        } else {
            return abort(404);
        }
    }

// fonction pour récupérer les données du formulaire de création de boisson
    public function store()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $form = new Boisson;
            $form->nom = request('boisson');
            $form->code = request('codeboisson');
            $form->prix = request('prixboisson');
            $form->save();

            return redirect('/boisson');
        } else {
            return abort(404);
        }
    }

//  fonction pour afficher la liste des boissons avec base de donnée
    public function bdd()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $test = Boisson::select()->orderby("nom", "ASC")->get();
            return view('boisson', compact('test'));
        } else {
            return abort(404);
        }
    }

// fonction pour supprimer une boisson et la recette
    public function supp($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $supp = Boisson::destroy($id);
            $suppRecette = Recette::where("boisson_id", $id)->delete();
            return redirect('/boisson');
        } else {
            return abort(404);
        }
    }

// fonction pour afficher le détail d'une boisson
    public function edit($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $requette = Boisson::where('id', $id)->get();
            return view('editBoisson', ["boissons" => $requette[0]]);
        } else {
            return abort(404);
        }
    }

    // fonction pour trier les boissons par ordre alphabétique
    public function orderZA()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $order = Boisson::select()->orderby("nom", "DESC")->get();
            return view('boisson', ['test' => $order]);
        } else {
            return abort(404);
        }
    }


    // Fonction pour afficher le formulaire de modification de boisson
    public function mod($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $boisson = Boisson::find($id);
            return view('modifBoisson', ["boisson" => $boisson]);
        } else {
            return abort(404);
        }
    }

// fonction pour récupérer les données du formulaire de modification de boisson
    public function modif($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $modif = Boisson::find($id);
            $modif->nom = request('boisson');
            $modif->prix = request('prixboisson');
            $modif->save();
            return redirect(route('boissonEdit', $id));
        } else {
            return abort(404);
        }
    }

    // fonction pour trier les boissons par ordre de prix croissont
    public function orderUp()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $test = Boisson::select()->orderby("prix", "ASC")->get();
            return view('boisson', compact('test'));
        } else {
            return abort(404);
        }
    }

    // fonction pour trier les boissons par ordre de prix décroissont
    public function orderDown()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $test = Boisson::select()->orderby("prix", "DESC")->get();
            return view('boisson', compact('test'));
        } else {
            return abort(404);
        }

    }


}


?>