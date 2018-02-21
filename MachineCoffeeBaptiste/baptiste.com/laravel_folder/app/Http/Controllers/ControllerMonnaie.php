<?php
namespace App\Http\Controllers;

use App\Coin;
use Illuminate\Support\Facades\Gate;

class ControllerMonnaie extends Controller
{
    public function mon()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $stockPieces = Coin::all();
            return view('monnaie', compact('stockPieces'));
        }else{
            return abort(404);
        }
    }

    // fonction pour afficher le détail d'une pièce
    public function edit($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $requette = Coin::where('id', $id)->get()->first();
            return view('modifPiece', ["piece" => $requette]);
        } else {
            return abort(404);
        }
    }

    public function modif($id)
    {
        if (Gate::allows('adminSuperAdmin')) {
            $modif = Coin::find($id);
            $modif->type = request('coin');
            $modif->stock = request('stock');
            $modif->save();
            return redirect(route('listePiece'));
        } else {
            return abort(404);
        }
    }
}

 ?>