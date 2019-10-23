<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    //
    protected $fillable = ['creator_name'];
    public function projects(){
        return $this->belongsTo('App\Projects');
    }
}
