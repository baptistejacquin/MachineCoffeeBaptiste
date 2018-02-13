<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ControllerIngredients extends Controller
{
    // public function ing() {

    // $stockIngredients = [
    // "cafe" => 50,
    // "eau" => 50,
    // "sucre" => 50,
    // "lait" => 50,
    // "gobelet" => 50,
    // "touillette" => 50

    // ];
    //    	return view('ingredients', compact('stockIngredients'));
    // }


    public function store()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $form = new Ingredient();
            $form->nom = request('ingredients');
            $form->code = request('codeIngredient');
            $form->stock = request('stockIngredient');
            $form->save();

            return redirect('/ingredients');
        } else {
            return abort(404);
        }
    }

    public function ajout()
    {
        if (\Gate::allows('adminSuperAdmin')) {
            return view('ajoutIngredient');
        } else {
            return abort(404);
        }
    }

    public function bdd()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $nomAsc = Ingredient::select()->orderby("nom", "ASC")->get();
            return view('ingredients', ['ordre' => $nomAsc]);
        } else {
            return abort(404);
        }
    }

    public function edit($id)
    {
        if (\Gate::allows('adminSuperAdmin')) {
            $requette = DB::select("SELECT * from ingredients where id = ?", [$id]);
            return view('editIngredients', ["ingredients" => $requette[0]]);
        } else {
            return abort(404);
        }
    }

    public function mod($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $ingredient = Ingredient::find($id);
            return view('modifIngredient', ["ingredient" => $ingredient]);
        } else {
            return abort(404);
        }
    }

    public function modif($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $modif = Ingredient::find($id);
            $modif->nom = request('Ingredient');
            $modif->stock = request('stockIngredient');
            $modif->save();
            return redirect('ingredients');
        } else {
            return abort(404);
        }
    }

    public function supp($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $supp = Ingredient::destroy($id);
            return redirect('/ingredients');
        } else {
            return abort(404);
        }
    }

    public function orderZA()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $nomDesc = Ingredient::select()->orderby("nom", "DESC")->get();
            return view('ingredients', ['ordre' => $nomDesc]);
        } else {
            return abort(404);
        }
    }

    public function orderUp()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $PrixUp = Ingredient::select()->orderby("stock", "ASC")->get();
            return view('ingredients', ['ordre' => $PrixUp]);
        } else {
            return abort(404);
        }
    }

    public function orderDown()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $PrixDown = Ingredient::select()->orderby("stock", "DESC")->get();
            return view('ingredients', ['ordre' => $PrixDown]);
        } else {
            return abort(404);
        }
    }
}


?>