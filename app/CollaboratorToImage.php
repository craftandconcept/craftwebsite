<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollaboratorToImage extends Model
{
    protected $guarded = ['id'];

    public function image(){
        return $this->hasOne('App\Image', 'id', 'image_id');
    }
}
