<?php

namespace App\Support;

use Markdown;
use Route;

class Helper
{
    /**
     * Get active HTML class if route is active.
     *
     * @param  string $routeName
     * @param  string $activeClass
     * @param  string $defaultClass
     * @return string
     */
    public static function active($routeName, $activeClass = 'active', $defaultClass = '')
    {
        if (is_null(Route::getCurrentRoute())) {
            return $defaultClass;
        }

        return Route::getCurrentRoute()->getName() == $routeName ? $activeClass : $defaultClass;
    }

    /**
     * Check if the given string is a valid URL.
     *
     * @param  string $url
     * @return bool
     */
    public static function isValidUrl($url)
    {
        return (bool) filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Escape Markdown and convert to HTML.
     *
     * @param  string $markdown
     * @return string
     */
    public static function markdownToHtml($markdown)
    {
        return Markdown::convertToHtml(e($markdown));
    }

    /**
     * Escape a name.
     * This is used in model factories, as Faker generates usernames that do not follow the
     * validation rules.
     *
     * @param  string $name
     * @return string
     */
    public static function escapeName($name)
    {
        return strtolower(substr(str_replace('.', '_', $name), 0, 20));
    }
}
