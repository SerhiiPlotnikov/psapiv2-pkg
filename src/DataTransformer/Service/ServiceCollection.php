<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Service;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class ServiceCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Service::class;

    public function __construct(?array $data)
    {
        parent::__construct($data);
        $this->uasort(function ($a, $b) {
            return $a->name >= $b->name;
        });
    }
}
