<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function cap(){
        return $this->hasMany('App\Caps');
    }
}
