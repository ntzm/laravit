<?php

namespace App;

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
}
