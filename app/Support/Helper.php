<?php

namespace App\Support;

use Route;

class Helper
{
    public static function active($route, $active = 'active', $default = '')
    {
        if (is_null(Route::getCurrentRoute())) {
            return $default;
        }
        return Route::getCurrentRoute()->getName() == $route ? $active : $default;
    }
}
