<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model {
    //

    /**
     * Get the comments for this recipe
     */
    public function comments() {
        return $this->hasMany('App\Entity\Comments', 'recipe_id');
    }

    /**
     * The average rank of the recipe
     */
    public function noteMoyenne() {
        //TODO
        return -1;
    }

    /**
     * Get the votes for this recipe
     */
    public function votes() {
        return $this->belongsToMany('App\User', 'votes', 'recipe_id', 'user_id');
    }

    /**
     * Get the media for this recipe
     */

    public function media() {
        return $this->belongsTo('App\Entity\Medias', 'media_id');
    }

}
