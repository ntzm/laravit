<?php

namespace App;

class Vote extends Model
{
    protected $table = 'votes';

    public function voteable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
