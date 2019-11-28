<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = ['name', 'last_name', 'title', 'description', 'main_image'];

    public function images(){
        return $this->hasMany('App\CollaboratorToImage', 'collaborator_id', 'id');
    }
}
