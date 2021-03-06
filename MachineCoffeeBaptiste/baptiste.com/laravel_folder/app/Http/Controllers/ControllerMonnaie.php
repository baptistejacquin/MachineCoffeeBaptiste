<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class ControllerMonnaie extends Controller
{
    public function mon()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $stockPieces = [
                "piece2" => ["value" => 2, "stock" => 100],
                "piece1" => ["value" => 1, "stock" => 100],
                "piece50" => ["value" => 0.5, "stock" => 100],
                "piece20" => ["value" => 0.2, "stock" => 100],
                "piece10" => ["value" => 0.1, "stock" => 100],
                "piece5" => ["value" => 0.05, "stock" => 10]
            ];
            return view('monnaie', compact('stockPieces'));
        }else{
            return abort(404);
        }
    }
}

 ?>