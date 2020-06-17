<?php declare(strict_types=1);

namespace Mrself\Util;

class StringUtil
{
    private static $camelizeCache = [];

    private static $enableCache = true;

    public static function camelize(
        string $origin,
        bool $firstUpperLetter = false
    ): string {
        if (static::$enableCache && isset(static::$camelizeCache[$origin])) {
            return static::$camelizeCache[$origin];
        }

        $string = str_replace(['-', '_', ' '], ' ', $origin);
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);

        if (!$firstUpperLetter) {
            $string = lcfirst($string);
        }

        static::$camelizeCache[$origin] = $string;
        return $string;
    }

    public static function camelizeIgnoreCache(
        string $origin,
        bool $firstUpperLetter = false
    ): string {
        static::disableCache();
        $result = static::camelize($origin, $firstUpperLetter);
        static::$enableCache = true;

        return $result;
    }

    public static function disableCache()
    {
        static::$enableCache = false;
    }
}