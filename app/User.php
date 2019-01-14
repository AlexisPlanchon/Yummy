<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'admin', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The articles written by this user
     */
    public function articles() {
        return $this->hasMany('App\Articles', 'article_id');
    }

    public function votes() {
        return $this->belongsToMany('App\User', 'votes', 'user_id', 'recipe_id');
    }

}
