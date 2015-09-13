<?php

namespace App;

use DB;
use Eloquent;

abstract class Model extends Eloquent
{
    /**
     * Check if given model is equal to this model
     *
     * @param Model $model The model to be tested
     * @return bool
     */
    public function is($model)
    {
        return $this->getKey() == $model->getKey();
    }

    /**
     * Order query by random
     *
     * @param $query
     * @return mixed
     */
    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }
}
