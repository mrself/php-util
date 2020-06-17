<?php declare(strict_types=1);

namespace Mrself\Util;

class StringUtil
{
    public static function camelize($string, $separator = '-', $firstUpperLetter = false)
    {
        $string = ucwords($string, $separator);
        $string = str_replace($separator, '', $string);

        if (!$firstUpperLetter) {
            $string = lcfirst($string);
        }

        return $string;
    }
}