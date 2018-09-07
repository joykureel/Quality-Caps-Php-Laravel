<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function cap(){
        return $this->hasMany('App\Caps');
    }
}
