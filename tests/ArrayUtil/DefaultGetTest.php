<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class DefaultGetTest extends TestCase
{
    public function testDefaultGetReturnValueByKeyIfItExists()
    {
        $value = ArrayUtil::defaultGet(['key' => 'value'], 'key');
        $this->assertEquals('value', $value);
    }

    public function testDefaultGetReturnDefaultParamIfKeyDoesNotExist()
    {
        $value = ArrayUtil::defaultGet([], 'key');
        $this->assertNull($value);
    }

    public function testDefaultGetReturnDefaultUserValueIfKeyDoesNotExist()
    {
        $value = ArrayUtil::defaultGet([], 'key', 'default');
        $this->assertEquals('default', $value);
    }
}