<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function personnes(){
        return $this->morphOne('App\Etudiant','personneable');
    }
    public function note(){
        return $this->hasMany('App\Note');
    }
}
