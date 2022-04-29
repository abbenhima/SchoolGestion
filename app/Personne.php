<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable = ['first_name','last_name','email','personneable'];

    public function personneable(){
        return $this->morphTo();

    }
}
