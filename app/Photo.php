<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['project_id', 'img', 'text','full'];

    public function projects(){
        return $this->belongsTo('App\Project');
    }
}
