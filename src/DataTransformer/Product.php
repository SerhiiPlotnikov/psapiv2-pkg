<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

use Psapiv2\DataTransformer\Supplier\ShortSupplier;
use Money\Money;

final class Product extends AbstractObjectHydrator
{
    public $pim_id;
    public $code;
    public $name;
    public $supplier;
    public $price;
    public $image;
    public $as_low_as;
    public $deleted_at;

    protected $casts = [
        'deleted_at' => 'date'
    ];

    protected $hydrates = [
        'supplier' => ShortSupplier::class
    ];

    public function getPrice(): Money
    {
        return Money::USD($this->price);
    }
}
