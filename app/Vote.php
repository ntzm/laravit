<?php

namespace App;

class Vote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
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
