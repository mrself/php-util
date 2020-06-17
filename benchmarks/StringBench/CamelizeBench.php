<?php declare(strict_types=1);

namespace App\Benchmarks;

use ICanBoogie\Inflector;
use Mrself\Util\StringUtil;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @Revs(1000)
 */
class CamelizeBench
{
    private $inflector;

    public function __construct()
    {
        $this->inflector = Inflector::get();
    }

    public function benchSimple()
    {
        $string = str_replace(['-', '_', ' '], ' ', 'a-b-c');
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);
        lcfirst($string);
    }

    public function benchICanBoogieInflector()
    {
        $this->inflector->camelize(
            'a-b-c',
            Inflector::DOWNCASE_FIRST_LETTER
        );
    }


    public function benchStringUtil()
    {
        StringUtil::camelize('a-b-c');
    }

    public function benchStringUtilIgnoreCache()
    {
        StringUtil::disableCache();
        StringUtil::camelize('a-b-c');
    }
}