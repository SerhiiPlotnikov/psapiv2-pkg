<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Accessory;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class AccessoryCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Accessory::class;

    public function __construct(?array $data)
    {
        parent::__construct($data);
        $this->uasort(function ($a, $b) {
            return $a->name >= $b->name;
        });
    }
}
