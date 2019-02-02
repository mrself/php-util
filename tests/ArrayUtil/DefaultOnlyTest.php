<?php declare(strict_types=1);

namespace Mrself\Util\Tests\ArrayUtil;

use Mrself\Util\ArrayUtil;
use PHPUnit\Framework\TestCase;

class DefaultOnlyTest extends TestCase
{
    public function testDefaultOnly()
    {
        $result = ArrayUtil::defaultOnly([], 1, ['a']);
        $this->assertEquals(['a' => 1], $result);
    }
}