<?php declare(strict_types=1);

namespace Mrself\Util;

class ArrayUtil
{
    public static function map(array $array, callable $cb): array
    {
        return array_map($cb, array_keys($array), $array);
    }
}