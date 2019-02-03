<?php declare(strict_types=1);

namespace Mrself\Util\Tests\PathUtil;

use Mrself\Util\PathUtil;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    public function testCanUsePathAsAString()
    {
        $actual = PathUtil::get(['a' => 1], 'a');
        $this->assertEquals(1, $actual);
    }

    public function testCanUsePathAsAnArray()
    {
        $actual = PathUtil::get(['a' => 1], ['a']);
        $this->assertEquals(1, $actual);
    }

    public function testCanUseObjectAsASource()
    {
        $obj = (object) ['a' => 1];
        $actual = PathUtil::get($obj, ['a']);
        $this->assertEquals(1, $actual);
    }

    public function testTwoLevelPathWork()
    {
        $source = ['a' => ['b' => 1]];
        $actual = PathUtil::get($source, 'a.b');
        $this->assertEquals(1, $actual);
    }

    public function testGetThrowsExceptionIfSourceHasInvalidType()
    {
        try {
            PathUtil::get('', 'a.b');
        } catch (PathUtil\InvalidSourceException $e) {
            $this->assertEquals(['a', 'b'], $e->getPath());
            $this->assertEquals('', $e->getSource());
            return;
        }
        $this->assertTrue(false);
    }

    public function testInvalidSourceExceptionStringifyPathInMessage()
    {
        $e = new PathUtil\InvalidSourceException('', ['a', 'b']);
        $this->assertContains('["a","b"]', $e->getMessage());
    }
}