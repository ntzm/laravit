<?php

namespace App\Support;

use Markdown;
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

    public static function isValidUrl($url)
    {
        return (bool)filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Escape Markdown and convert to HTML
     *
     * @param $markdown
     * @return string
     */
    public static function markdownToHtml($markdown)
    {
        return Markdown::convertToHtml(e($markdown));
    }
}
