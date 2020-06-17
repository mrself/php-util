<?php declare(strict_types=1);

namespace Mrself\Util;

class StringUtil
{
    private static $camelizeCache = [];

    private static $enableCache = true;

    public static function camelize($origin, $separator = '-', $firstUpperLetter = false)
    {
        if (static::$enableCache && isset(static::$camelizeCache[$origin])) {
            return static::$camelizeCache[$origin];
        }

        $string = ucwords($origin, $separator);
        $string = str_replace($separator, '', $string);

        if (!$firstUpperLetter) {
            $string = lcfirst($string);
        }

        static::$camelizeCache[$origin] = $string;
        return $string;
    }

    public static function camelizeIgnoreCache(
        string $origin,
        string $separator = '-',
        bool $firstUpperLetter = false
    ): string {
        static::disableCache();
        $result = static::camelize($origin, $separator, $firstUpperLetter);
        static::$enableCache = true;

        return $result;
    }

    public static function disableCache()
    {
        static::$enableCache = false;
    }
}