<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class StrictPullTest extends TestCase
{
    use ArrayTestTrait;

    public function testItWorks()
    {
        $array = ['key' => 'value'];
        $this->assertEquals('value', ArrayUtil::strictPull($array, 'key'));
        $this->assertEquals([], $array);
    }

    public function testItThrowsException()
    {
        $array = [];
        try {
            ArrayUtil::strictPull($array, 'key');
        } catch (ArrayUtil\NotFoundException $e) {
            $this->assertNotFoundException($e, 'key', $array);
            return;
        }
        $this->assertTrue(false);
    }
}