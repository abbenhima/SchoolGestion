<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    public function personnes(){
        return $this->morphOne('App\Professeur','personneable');
    }
    public function cour(){
        return $this->hasMany('App\Cour');
    }
}
