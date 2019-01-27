<?php declare(strict_types=1);

namespace Mrself\Util\MiscUtil;

class InvalidSourceException extends MiscUtilException
{
    /**
     * @var *
     */
    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
        $type = gettype($source);
        parent::__construct("Source has unsupported type: $type. Allowed types are: array, object.");
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}