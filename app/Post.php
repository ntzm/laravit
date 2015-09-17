<?php

namespace App;

use App\Laravit\SortableInterface;
use App\Laravit\SortableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface, SortableInterface
{
    use SluggableTrait, SortableTrait;

    protected $sluggable = [
        'build_from' => 'title',
    ];

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * Find post author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find the sub that the post was posted to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub()
    {
        return $this->belongsTo(Sub::class);
    }

    /**
     * Get all votes on the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    /**
     * Get all comments on the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
