<?php

namespace App;

use Eloquent;

class Comment extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'voteable');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }
}
