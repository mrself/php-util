<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class IsAssocTest extends TestCase
{
    public function testItReturnsTrueOnAssociativeArray()
    {
        $this->assertTrue(ArrayUtil::isAssoc(['a' => 1]));
    }

    public function testItReturnsFalseOnIndexedArray()
    {
        $this->assertFalse(ArrayUtil::isAssoc([1]));
    }

    public function testItReturnsFalseOnMixedArray()
    {
        $this->assertFalse(ArrayUtil::isAssoc([1, 'a' => 1]));
    }

    public function testItReturnsTrueOnMixedArrayWithSecondParamAsFalse()
    {
        $this->assertTrue(ArrayUtil::isAssoc([1, 'a' => 1], false));
    }
}