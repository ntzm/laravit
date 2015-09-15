<?php

namespace App\Support;

use Markdown;
use Route;

class Helper
{
    /**
     * Get active HTML class if route is active.
     *
     * @param        $route   The name of the route to test
     * @param string $active  The class to be returned if route is active
     * @param string $default The class to be returned if route isn't active
     * @return string
     */
    public static function active($route, $active = 'active', $default = '')
    {
        if (is_null(Route::getCurrentRoute())) {
            return $default;
        }

        return Route::getCurrentRoute()->getName() == $route ? $active : $default;
    }

    /**
     * Check if the given string is a valid URL.
     *
     * @param string $url The string to be checked
     * @return bool
     */
    public static function isValidUrl($url)
    {
        return (bool) filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Escape Markdown and convert to HTML.
     *
     * @param string $markdown The markdown to be escaped and converted to HTML
     * @return string
     */
    public static function markdownToHtml($markdown)
    {
        return Markdown::convertToHtml(e($markdown));
    }

    /**
     * Escape a name.
     * This is used in model factories, as Faker generates usernames that do not follow the validation rules.
     *
     * @param string $name The unescaped name
     * @return string The escaped name
     */
    public static function escapeName($name)
    {
        return strtolower(substr(str_replace('.', '_', $name), 0, 20));
    }
}
