<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caps extends Model
{
    public function category(){
       return $this->belongsTo('App\Category');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier');
     }
}
