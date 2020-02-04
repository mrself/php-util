<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class ArraySomeTest extends TestCase
{
    public function testItReturnsTrueIfArrayContainsAtLeastOneFromAnotherArray()
    {
        $arrayCheckIn = [1];
        $elementsArray = [1, 2];
        $result = ArrayUtil::arraySome($arrayCheckIn, $elementsArray);
        $this->assertTrue($result);
    }

    public function testItReturnsFalseIfArrayDoesNotContainAtLeastOneFromAnotherArray()
    {
        $arrayCheckIn = [];
        $elementsArray = [1, 2];
        $result = ArrayUtil::arraySome($arrayCheckIn, $elementsArray);
        $this->assertFalse($result);
    }
}