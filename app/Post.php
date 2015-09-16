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

    /**
     * Query hot posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
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

    /**
     * Find post author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Find the sub that the post was posted to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub()
    {
        return $this->belongsTo('App\Sub');
    }

    /**
     * Get all votes on the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'voteable');
    }

    /**
     * Get all comments on the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
