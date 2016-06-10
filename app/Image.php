<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
