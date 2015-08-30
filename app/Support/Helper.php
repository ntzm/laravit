<?php

namespace App\Support;

use Route;

class Helper
{
    public static function active($route, $active = 'active', $default = '')
    {
        return Route::getCurrentRoute()->getName() == $route ? $active : $default;
    }
}
