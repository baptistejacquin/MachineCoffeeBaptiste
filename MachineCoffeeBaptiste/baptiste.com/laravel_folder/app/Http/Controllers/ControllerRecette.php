<?php

namespace App\Http\Controllers;

use App\Boisson;
use App\Ingredient;
use App\Recette;
use Illuminate\Support\Facades\Gate;

class ControllerRecette extends Controller
{


// pour afficher la liste des boissons
    public function bdd()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $nomAsc = Recette::select()->orderby("boisson_id", "ASC")->get();
            $nomBoisson = Boisson::all();

            return view('recette', ['ordre' => $nomAsc], ['nomBois' => $nomBoisson]);
        } else {
            return abort(404);
        }
    }

// fonction pour afficher le détail d'une recette
    public function edit($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $requette = Boisson::where('id', $id)->get();
            $ing = Recette::where('boisson_id', $id)->get();
            $boissons = Boisson::select()->get();
            $ingredients = Ingredient::select()->get();
            return view('editRecettes', ["boisson" => $requette[0], "recettes" => $ing, "boissons" => $boissons, "ingredients" => $ingredients]);
        } else {
            return abort(404);
        }
    }

// fonction pour supprimer une recette et sa boisson
    public function supp($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $supp = Recette::where("boisson_id", $id)->delete();
            $test = Boisson::where("id", $id)->delete();

            return redirect('recette');
        } else {
            return abort(404);
        }
    }

// fonction pour supprimer une ligne
    public function suppligne($id)
    {
        if (Gate::allows('adminSuperAdmin')) {

            $supp = Recette::where("id", $id)->delete();

            return redirect()->back();
            // Méthode back veux dire que je redirige vers la vue ou j'étais avant !
        } else {
            return abort(404);
        }
    }

// fonction pour ajouter une nouvelle recette
    public function store()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $form = new Recette();
            $form->boisson_id = request('boisson');
            $form->ingredient_id = request('ingredient');
            $form->quantite = request('quantite');
            $form->save();
            return redirect('/recette/' . $form->boisson_id);
        } else {
            return abort(404);
        }
    }

// fonction pour afficher le formulaire de modification des recettes
    public function mod($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $recette = Recette::find($id);
//        $requette = Boisson::where('id',$id)->get();
            $ing = Recette::where('boisson_id', $id)->get();
            $boissons = Boisson::select()->get();
            $ingredients = Ingredient::select()->get();
            return view('formRecetteAjout', ["recette" => $recette, "recettes" => $ing, "boissons" => $boissons, "ingredients" => $ingredients]);
        } else {
            return abort(404);
        }
    }

// fonction pour modifier des recettes en récupérant les données du form de modification des recettes
    public function modif($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $modif = Recette::find($id);
            $modif->boisson_id = request('boisson');
            $modif->ingredient_id = request('ingredient');
            $modif->quantite = request('quantite');
            $modif->save();
            return redirect('recette/' . $modif->boisson_id);
        } else {
            return abort(404);
        }
    }

    public function search()
    {
        $boissonNom = Boisson::where('nom', request("searchRecette"))->get()->first();
        if ($boissonNom) {
            $boissons = Boisson::where('nom', $boissonNom->nom)->orderby("created_at", "DESC")->get();
            return view('recette', ['nomBois' => $boissons]);
        } else{
            return redirect()->back()->with('error', "La boisson n'éxiste pas");
        }
    }
}


?>