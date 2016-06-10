<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * Get all the tags for each content peice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function content()
    {
        return $this->belongsToMany('App\Content');
    }

    /**
     * Get all the tags for each survey
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function survey()
    {
        return $this->belongsToMany('App\Survey');
    }

}
