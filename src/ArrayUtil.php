<?php declare(strict_types=1);

namespace Mrself\Util;

class ArrayUtil
{
    public static function map(array $array, callable $cb): array
    {
        $map = [];
        foreach ($array as $key => $value) {
            $map[$key] = $cb($value, $key);
        }
        return $map;
    }
}