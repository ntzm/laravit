<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
