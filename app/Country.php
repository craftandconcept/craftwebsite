<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function projects(){
        return $this->belongsTo('App\Projects');
    }
}
