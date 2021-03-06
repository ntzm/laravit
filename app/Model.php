<?php

namespace App;

use DB;
use Eloquent;

abstract class Model extends Eloquent
{
    /**
     * Check if given model is equal to this model.
     *
     * @param  Model $model
     * @return bool
     */
    public function is($model)
    {
        return $this->getKey() == $model->getKey();
    }

    /**
     * Order query by random.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }
}
