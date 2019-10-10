<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Price;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class PriceCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Price::class;

    public function __construct(?array $data)
    {
        parent::__construct($data);
        $this->uasort(function ($a, $b) {
            return $a <=> $b;
        });
    }
}
