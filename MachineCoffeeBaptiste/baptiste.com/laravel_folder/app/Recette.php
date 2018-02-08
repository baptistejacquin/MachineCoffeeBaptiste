<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable= ['boisson_id',
        'ingredient_id',
        'quantite'];
    public function boisson(){
        return $this->belongsTo('App\Boisson');
    }
    public function ingredient(){
        return $this->belongsTo('App\Ingredient');
    }


}
