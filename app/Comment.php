<?php

namespace App;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'content',
    ];

    public function scopeNoParent($query)
    {
        return $query->where('parent_id', '0');
    }

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

    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
