<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Boisson;
use App\Recette;

class ControllerBoisson extends Controller
{


// Fonction pour afficher le formulaire de création de boisson
    public function ajout()
    {
        return view('boissonRecette');
    }

// fonction pour récupérer les données du formulaire de création de boisson
    public function store()
    {
        $form = new Boisson;
        $form->nom = request('boisson');
        $form->code = request('codeboisson');
        $form->prix = request('prixboisson');
        $form->save();

        return redirect('/boisson');
    }

//  fonction pour afficher la liste des boissons avec base de donnée
    public function bdd()
    {
        $test = Boisson::select()->orderby("nom", "ASC")->get();
        return view('boisson', compact('test'));
    }

// fonction pour supprimer une boisson et la recette
    public function supp($id)
    {
        $supp = Boisson::destroy($id);
        $suppRecette = Recette::where("boisson_id", $id)->delete();
        return redirect('/boisson');
    }

// fonction pour afficher le détail d'une boisson
    public function edit($id)
    {
        $requette = Boisson::where('id', $id)->get();
        return view('editBoisson', ["boissons" => $requette[0]]);
    }

    // fonction pour trier les boissons par ordre alphabétique
    public function orderZA()
    {
        $order = Boisson::select()->orderby("nom", "DESC")->get();
        return view('boisson', ['test' => $order]);
    }


    // Fonction pour afficher le formulaire de modification de boisson
    public function mod($id)
    {
        $boisson = Boisson::find($id);
        return view('modifBoisson', ["boisson" => $boisson]);
    }

// fonction pour récupérer les données du formulaire de modification de boisson
    public function modif($id)
    {
        $modif = Boisson::find($id);
        $modif->nom = request('boisson');
        $modif->prix = request('prixboisson');
        $modif->save();
        return redirect(route('boissonEdit', $id));
    }

    // fonction pour trier les boissons par ordre de prix croissont
    public function orderUp()
    {
        $test = Boisson::select()->orderby("prix", "ASC")->get();
        return view('boisson', compact('test'));
    }

    // fonction pour trier les boissons par ordre de prix décroissont
    public function orderDown()
    {
        $test = Boisson::select()->orderby("prix", "DESC")->get();
        return view('boisson', compact('test'));

    }


}


?>