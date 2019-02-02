<?php declare(strict_types=1);

namespace Mrself\Util\ArrayUtil;

class NotFoundException extends \Exception
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var mixed
     */
    protected $key;

    public function __construct(array $array, $key)
    {
        $this->array = $array;
        $this->key = $key;
        $array = json_encode($array);

        parent::__construct("Array '$array' does not contain key '$key'");
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }
}