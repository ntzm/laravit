<?php

namespace App;

class Sub extends Model
{
    protected $table = 'subs';

    protected $fillable = [
        'name',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
