<?php declare(strict_types=1);

namespace Mrself\Util\MiscUtil;

class AbsentKeyException extends MiscUtilException
{
    /**
     * @var *
     */
    protected $source;

    /**
     * @var string
     */
    protected $key;

    public function __construct($source, string $key)
    {
        $this->source = $source;
        $this->key = $key;

        parent::__construct("The source does not contain a value for the key: $key");
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
}