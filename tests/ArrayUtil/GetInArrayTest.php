<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class GetInArrayTest extends TestCase
{
    public function testItReturnsArrayWhereKeysExistInAnotherArray()
    {
        $actual = ArrayUtil::getInArray(['a', 'b'], ['a' => 1]);
        $this->assertEquals(['a'], $actual);
    }
}