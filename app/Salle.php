<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = ['cour_id'];
    public function cour() {

        return $this->belongsTo('App\Cour');

    }
}
