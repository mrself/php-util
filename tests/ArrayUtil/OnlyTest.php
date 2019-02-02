<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class OnlyTest extends TestCase
{
    public function testOnly()
    {
        $result = ArrayUtil::only(['a' => 1, 'b' => 2], ['a']);
        $this->assertEquals(['a' => 1], $result);
    }

    public function testOnlyThrowsExceptionIfKeyIsAbsent()
    {
        try {
            ArrayUtil::only([], ['a']);
        } catch (ArrayUtil\NotFoundException $e) {
            $this->assertEquals('a', $e->getKey());
            $this->assertEquals([], $e->getArray());
            return;
        }
        $this->assertTrue(false);
    }
}