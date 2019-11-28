<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'last_name', 'title', 'description', 'main_image'];

    public function images(){
        return $this->hasMany('App\TeamToImage', 'team_id', 'id');
    }
}
