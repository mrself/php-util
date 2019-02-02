<?php declare(strict_types=1);

namespace Mrself\Util;

use Mrself\Util\ArrayUtil\NotFoundException;

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

    /**
     * @param array $array
     * @param array $keys
     * @return array
     * @throws NotFoundException
     */
    public static function only(array $array, array $keys = [])
    {
        $result = [];
        foreach ($keys as $key) {
            if (!array_key_exists($key, $array)) {
                throw new NotFoundException($array, $key);
            }
            $result[$key] = $array[$key];
        }
        return $result;
	}
}