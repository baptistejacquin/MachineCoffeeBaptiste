<?php

namespace App\Http\Controllers;

use App\Boisson;
use App\Ingredient;
use App\Recette;

class ControllerRecette extends Controller
{


// pour afficher la liste des boissons
    public function bdd()
    {
        $nomAsc = Recette::select()->orderby("boisson_id", "ASC")->get();
        $nomBoisson = Boisson::all();

        return view('recette', ['ordre' => $nomAsc], ['nomBois' => $nomBoisson]);
    }

// fonction pour afficher le détail d'une recette
    public function edit($id)
    {
        $requette = Boisson::where('id', $id)->get();
        $ing = Recette::where('boisson_id', $id)->get();
        $boissons = Boisson::select()->get();
        $ingredients = Ingredient::select()->get();
        return view('editRecettes', ["boisson" => $requette[0], "recettes" => $ing, "boissons" => $boissons, "ingredients" => $ingredients]);
    }

// fonction pour supprimer une recette et sa boisson
    public function supp($id)
    {
        $supp = Recette::where("boisson_id", $id)->delete();
        $test = Boisson::where("id", $id)->delete();

        return redirect('recette');
    }

// fonction pour supprimer une ligne
    public function suppligne($id)
    {

        $supp = Recette::where("id", $id)->delete();

        return redirect()->back();
        // Méthode back veux dire que je redirige vers la vue ou j'étais avant !
    }

    // fonction pour ajouter une nouvelle recette
    public function store()
    {
        $form = new Recette();
        $form->boisson_id = request('boisson');
        $form->ingredient_id = request('ingredient');
        $form->quantite = request('quantite');
        $form->save();
        return redirect('/recette/' . $form->boisson_id);
    }

    public function mod($id)
    {
        $recette = Recette::find($id);
//        $requette = Boisson::where('id',$id)->get();
        $ing = Recette::where('boisson_id', $id)->get();
        $boissons = Boisson::select()->get();
        $ingredients = Ingredient::select()->get();
        return view('formRecetteAjout', ["recette" => $recette, "recettes" => $ing, "boissons" => $boissons, "ingredients" => $ingredients]);
    }

    public function modif($id)
    {
        $modif = Recette::find($id);
        $modif->boisson_id = request('boisson');
        $modif->ingredient_id = request('ingredient');
        $modif->quantite = request('quantite');
        $modif->save();
        return redirect('recette/' . $modif->boisson_id);
    }
}


?>