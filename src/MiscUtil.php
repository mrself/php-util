<?php declare(strict_types=1);

namespace Mrself\Util;

use Mrself\Util\MiscUtil\AbsentKeyException;
use Mrself\Util\MiscUtil\InvalidSourceException;

class MiscUtil
{
    /**
     * Returns array of values from source (array or object) by its keys
     * @param * $source
     * @param string[] $keys
     * @return array
     * @throws AbsentKeyException
     * @throws InvalidSourceException
     */
    public static function only($source, array $keys): array
    {
        $result = [];
        foreach ($keys as $key) {
            if (is_array($source)) {
                if (!array_key_exists($key, $source)) {
                    throw new AbsentKeyException($source, $key);
                }
                $result[$key] = $source[$key];
            } elseif (is_object($source)) {
                if (!property_exists($source, $key)) {
                    throw new AbsentKeyException($source, $key);
                }
                $result[$key] = $source->$key;
            } else {
                throw new InvalidSourceException($source);
            }
        }
        return $result;
    }
}