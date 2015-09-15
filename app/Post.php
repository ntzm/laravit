<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Support\Facades\DB;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
    ];

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];

    public function scopeHot($query)
    {
        // Source: http://thisinterestsme.com/creating-whats-hot-algorithm-php-mysql
        // TODO: Clean up this mess
        return $query->leftJoin('votes', function ($join) {
            $join->on('posts.id', '=', 'votes.voteable_id')
                ->where('voteable_type', '=', 'App\Post');
        })
            ->select('posts.*', 'votes.value')
            ->groupBy('posts.id')
            ->orderBy(DB::raw(
                'log10(abs(sum(votes.value)) + 1 ) * sign(sum(votes.value))'.
                '+ (unix_timestamp(posts.created_at) / 300000)'
            ), 'desc');
    }

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
        return $this->morphMany('App\Vote', 'voteable');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
