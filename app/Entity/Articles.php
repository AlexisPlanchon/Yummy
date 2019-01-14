<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {

    /**
     * Get the media for this Article
     */

    public function media() {
        return $this->belongsTo('App\Entity\Medias', 'media_id');
    }

    /**
     * Get the user that write the article.
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }


}
