<?php declare(strict_types=1);

namespace Mrself\Util\Tests\StringUtil;

use Mrself\Util\StringUtil;
use PHPUnit\Framework\TestCase;

class CamelizeTest extends TestCase
{
    public function testItRemovesSpacesAndMakesFirstUpperCased()
    {
        $actual = StringUtil::camelize('a b', ' ');
        $this->assertEquals('aB', $actual);
    }

    public function testItRemovesDashes()
    {
        $actual = StringUtil::camelize('a-b', '-');
        $this->assertEquals('aB', $actual);
    }

    public function testItMakesTheFirstCharacterLowerCased()
    {
        $actual = StringUtil::camelize('AbAv');
        $this->assertEquals('abAv', $actual);
    }

    public function testItCanMakeTheFirstCharacterUpperCased()
    {
        $actual = StringUtil::camelize('ab', '-', true);
        $this->assertEquals('Ab', $actual);
    }
}