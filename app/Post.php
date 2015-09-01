<?php

namespace App;

use Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Eloquent implements SluggableInterface
{
    use SluggableTrait;

    /**
     * Eloquent sluggable options
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sub()
    {
        return $this->belongsTo('App\Sub');
    }

    public function votes()
    {
        return $this->hasMany('App\PostVote');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
