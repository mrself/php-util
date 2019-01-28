<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class MapTest extends TestCase
{
    public function testItWorks()
    {
        $source = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];
        $expected = [
            'key1' => 'value1_',
            'key2' => 'value2_'
        ];
        $actual = ArrayUtil::map($source, function ($value, $key) {
            return $value . '_';
        });
        $this->assertEquals($expected, $actual);
    }

	public function testCallbackCanOmitSecondParam() {
		ArrayUtil::map([1], function ($value) {
			return $value;
		});
		$this->assertTrue(true);
    }
}