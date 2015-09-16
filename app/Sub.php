<?php

namespace App;

class Sub extends Model
{
    protected $table = 'subs';

    protected $fillable = [
        'name',
    ];

    /**
     * Find sub owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    /**
     * Get all posts posted on sub.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
