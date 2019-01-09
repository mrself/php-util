<?php declare(strict_types=1);

namespace Mrself\Util;

class PathUtil
{
    public static function get($source, $path, $defaultValue = null)
    {
        if (!is_array($path)) {
            $path = explode('.', $path);
        }
        while (null !== ($key = array_shift($path))) {
            if (is_object($source)) {
                $source = $source->$key;
            } elseif (is_array($source)) {
                if (array_key_exists($key, $source)) {
                    $source = $source[$key];
                } else {
                    $source = $defaultValue;
                    break;
                }
            }
        }
        return $source;
    }
}