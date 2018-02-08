<?php  

namespace App\Http\Controllers;


use App\Vente;

class ControllerVente extends Controller
{
    public function index()
   {
        $ventes = Vente::all();
// [
//
//        "1" => ["date" => '01-01-18',
//                "heure" => '13:02',
//                "boisson"=> 'cafe'
//                ],
//        "2" => ["date" => '01-01-18',
//                "heure" => '13:11',
//                "boisson"=> 'the'
//                ],
//        "3" => ["date" => '01-01-18',
//                "heure" => '13:12',
//                "boisson"=> 'chocolat'
//                ],
//        "4" => ["date" => '01-01-18',
//                "heure" => '13:22',
//                "boisson"=> 'cafe'
//                ],
//        ];

    return view('vente', compact('ventes'));
    }
}

?>