<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentGallery extends Model
{
    protected $fillable = ['path', 'link', 'sort', 'time'];
}
