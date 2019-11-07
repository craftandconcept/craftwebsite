<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name','country_id','collaborators','size','main_description', 'city', 'status','function','photos_by','main_image', 'main_text', 'creator_id'];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function creators(){
        return $this->hasOne('App\Creator', 'id');
    }
    public function countries(){
        return $this->hasOne('App\Country', 'id');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }

}
