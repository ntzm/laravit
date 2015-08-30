<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_votes';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
