<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{

    use SoftDeletes;

    
    /**
     *  Get the tags associated with the given content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Can belong to many surveys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function survey(){
        return $this->belongsToMany('App\Survey');
    }
}
