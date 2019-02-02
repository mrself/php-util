<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil\NotFoundException;

trait ArrayTestTrait
{
    protected function assertNotFoundException(NotFoundException $e, string $key, array $array)
    {
        $this->assertEquals($key, $e->getKey());
        $this->assertEquals($array, $e->getArray());
    }
}