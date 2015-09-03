<?php

namespace App;

use Eloquent;

abstract class Model extends Eloquent
{
    public function is($model)
    {
        return $this->getKey() == $model->getKey();
    }
}
