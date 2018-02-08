<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    public function boisson(){
        return $this->belongsTo('App\Boisson');
    }
}
