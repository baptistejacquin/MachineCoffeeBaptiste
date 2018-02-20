<?php

namespace App\Http\Controllers;

use App\Recette;
use Illuminate\Http\Request;
use App\Vente;
use App\Boisson;
use App\Ingredient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){
        if (Gate::allows('all')) {
            return view('welcome');
        }
    }

    public function index()
    {
        $boissons = Boisson::all();
        $nbSucres = Ingredient::where('nom', 'Sucre')->first();
        return view('Front', ['boissons' => $boissons, 'nbSucres' => $nbSucres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // fonction pour créer une nouvelle vente
            $vente = new Vente;
            $vente->boisson_id = request('boisson');
            if (Auth::user()) {
                $vente->user_id = Auth::id();
            }else{
                $vente->user_id = 0;
            }
            $vente->boisson_prix = $vente->boisson->prix;
            $vente->nbSucre = request('sucre');
            $vente->save();

            // Fonction pour déduire le stock en fonction de la recette de la boisson
            $recettes = Recette::where('boisson_id', request('boisson'))->get();
            foreach ($recettes as $recette) {
                $nbdose = $recette->quantite;
                $ingredients = Ingredient::where('id', $recette->ingredient_id)->get();
                foreach ($ingredients as $ingredient) {
                    $ingredient->stock = $ingredient->stock - $nbdose;
                    $ingredient->save();
                }
            }

            // Fonction qui déduit le stock de Sucre
            $sucre = Ingredient::where('nom', Ingredient::SUCRE)->first();
            $sucre->stock = $sucre->stock - request('sucre');
            $sucre->save();

            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
