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

	public static function pull(array &$array, string $key, $default = null)
	{
		if (array_key_exists($key, $array)) {
			$value = $array[$key];
			unset($array[$key]);
			return $value;
		}
		return $default;
	}
}