<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function etudiant(){
        return $this->belongsTo('App\Etudiant');
    }
    public function cour(){
        return $this->belongsTo('App\Cour');
    } 
}
