<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

abstract class EntityCollection
{
    protected $collection;

    public function __construct(\stdClass $data)
    {
        $this->collection = $data;
    }

    abstract public function getResponse(): array;
}
