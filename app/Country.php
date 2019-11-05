<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = ['country_name'];

    public function projects(){
        return $this->belongsTo('App\Projects');
    }
}
