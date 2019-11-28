<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = ['creator_name', 'creator_last_name', 'creator_title', 'creator_description', 'creator_main_image'];

    public function projects(){
        return $this->belongsTo('App\Projects');
    }

    public function images(){
        return $this->hasMany('App\CreatorToImage', 'creator_id', 'id');
    }
}
