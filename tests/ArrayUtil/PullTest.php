<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class PullTest extends TestCase
{
    public function testItReturnsValueByKey()
    {
        $array = ['key' => 'value'];
        $this->assertEquals('value', ArrayUtil::pull($array, 'key'));
    }

    public function testItRemovesKeyFromArray()
    {
        $array = ['key' => 'value'];
        ArrayUtil::pull($array, 'key');
        $this->assertNotContains('value', $array);
    }

    public function testItReturnsDefaultValueIfArrayDoesNotHaveKey()
    {
        $array = [];
        $result = ArrayUtil::pull($array, 'key', 'value');
        $this->assertEquals('value', $result);
    }
}