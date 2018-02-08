<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $fillable = ['nom','prix'];

    public function recettes(){
        return $this->hasMany('App\Recette');
    }

    public function ventes(){
        return $this->hasMany('App\Vente');
    }
}
