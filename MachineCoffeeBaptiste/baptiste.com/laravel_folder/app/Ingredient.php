<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    const SUCRE = 'Sucre';
    protected $fillable = ['nom',
        'stock'];

    public function recettes(){
        return $this->hasMany('App\Recette');
    }
}
