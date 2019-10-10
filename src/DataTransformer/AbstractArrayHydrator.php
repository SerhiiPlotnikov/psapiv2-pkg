<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

abstract class AbstractArrayHydrator extends \ArrayObject
{
    protected $castsCollectionToType;

    public function __construct(?array $data)
    {
        $response = $data;
        if ($this->castsCollectionToType) {
            $response = [];
            foreach ($data as $index => $obj) {
                $response[] = new $this->castsCollectionToType($obj);
            }
        }
        parent::__construct($response);
    }
}
