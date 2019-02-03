<?php declare(strict_types=1);

namespace Mrself\Util;

use Mrself\Util\PathUtil\InvalidSourceException;

class PathUtil
{
    public static function get($source, $path, $defaultValue = null)
    {
        if (is_string($path) && substr($path, 0, strlen('value')) === 'value') {
            $path = explode(':', $path);
            if (array_key_exists(2, $path)) {
                $result = $path[1];
                settype($result, $path[2]);
                return $result;
            }
            return $path[1];
        }
        if (!is_array($path)) {
            $path = explode('.', $path);
        }
        $originalPath = $path;
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
            } else {
                throw new InvalidSourceException($source, $originalPath);
            }
        }
        return $source;
    }
}