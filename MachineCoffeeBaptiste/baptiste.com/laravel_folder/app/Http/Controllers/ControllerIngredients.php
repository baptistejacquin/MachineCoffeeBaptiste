<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Support\Facades\DB;

class ControllerIngredients extends Controller{
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


    public function store(){
        $form = new Ingredient();
        $form->nom = request('ingredients');
        $form->code = request('codeIngredient');
        $form->stock = request('stockIngredient');
        $form->save();

        return redirect('/ingredients');
    }

    public function ajout(){
        return view('ajoutIngredient');
    }

    public function bdd(){
        $nomAsc = Ingredient::select()->orderby("nom","ASC")->get();
        return view('ingredients', ['ordre'=>$nomAsc]);
    }
     public function edit($id){
    	$requette = DB::select("SELECT * from ingredients where id = ?",[$id]);
    	return view('editIngredients' , ["ingredients" => $requette[0]]);
    }

    public function mod($id){
        $ingredient = Ingredient::find($id);
        return view('modifIngredient', ["ingredient"=> $ingredient]);
    }

    public function modif($id){
        $modif = Ingredient::find($id);
        $modif->nom = request('Ingredient');
        $modif->stock = request('stockIngredient');
        $modif->save();
        return redirect('ingredients');
    }

    public function supp($id){
        $supp= Ingredient::destroy($id);
        return redirect('/ingredients');
    }

    public function orderZA(){
        $nomDesc = Ingredient::select()->orderby("nom","DESC")->get();
        return view('ingredients', ['ordre'=>$nomDesc]);
    }

    public function orderUp(){
        $PrixUp = Ingredient::select()->orderby("stock","ASC")->get();
        return view('ingredients', ['ordre'=>$PrixUp]);
    }

    public function orderDown()
    {
        $PrixDown = Ingredient::select()->orderby("stock", "DESC")->get();
        return view('ingredients', ['ordre'=>$PrixDown]);
    }
}



?>