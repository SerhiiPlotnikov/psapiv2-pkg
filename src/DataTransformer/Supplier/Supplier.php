<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Supplier;

use Psapiv2\DataTransformer\Address;

final class Supplier extends ShortSupplier
{
    public $address;

    protected $hydrates = [
        'address' => Address::class
    ];
}
