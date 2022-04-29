<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    public function professeur(){
        return $this->belongsTo('App\Professeur');
    }
    public function Salle() {

        return $this->hasMany('App\Salle');

    }
    public function note() {

        return $this->hasMany('App\Note');

    }


}
