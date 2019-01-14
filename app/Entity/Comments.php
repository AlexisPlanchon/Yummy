<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

    /**
     * Get the user that write the comment.
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
