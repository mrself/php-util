<?php declare(strict_types=1);

namespace Mrself\Util\Tests\MiscUtil;

use Mrself\Util\MiscUtil;
use PHPUnit\Framework\TestCase;

class OnlyTest extends TestCase
{
    public function testItWorksWithArray()
    {
        $source = [
            'key1' => 1,
            'key2' => 2,
            'key3' => 3
        ];
        $result = MiscUtil::only($source, ['key1', 'key2']);
        $expected = [
            'key1' => 1,
            'key2' => 2,
        ];
        $this->assertEquals($expected, $result);
    }

    public function testItWorksWithObject()
    {
        $source = (object) [
            'key1' => 1,
            'key2' => 2,
            'key3' => 3
        ];
        $result = MiscUtil::only($source, ['key1', 'key2']);
        $expected = [
            'key1' => 1,
            'key2' => 2,
        ];
        $this->assertEquals($expected, $result);
    }

    /**
     * @expectedException \Mrself\Util\MiscUtil\InvalidSourceException
     */
    public function testItThrowsExceptionIfSourceHasUnsupportedType()
    {
        MiscUtil::only('unsupportedType', ['key1', 'key2']);
    }

    /**
     * @expectedException \Mrself\Util\MiscUtil\AbsentKeyException
     */
    public function testItThrowsExceptionIfArrayKeyDoesNotExist()
    {
        $source = [
            'key1' => 1
        ];
        MiscUtil::only($source, ['key1', 'key2']);
    }

    /**
     * @expectedException \Mrself\Util\MiscUtil\AbsentKeyException
     */
    public function testItThrowsExceptionIfObjectKeyDoesNotExist()
    {
        $source = (object) [
            'key1' => 1
        ];
        MiscUtil::only($source, ['key1', 'key2']);
    }
}