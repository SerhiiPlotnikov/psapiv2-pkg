<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\SupplierProduct;

use Money\Money;
use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Psapiv2\DataTransformer\Supplier\ShortSupplier;
use Psapiv2\DataTransformer\Variant\VariantCollection;

class ShortSupplierProduct extends AbstractObjectHydrator
{
    public $pim_id;
    public $code;
    public $name;
    public $supplier;
    public $price;
    public $image;
    public $as_low_as;
    public $variants;
    public $deleted_at;

    protected $hydrates = [
        'supplier' => ShortSupplier::class,
        'variants' => VariantCollection::class
    ];

    protected $casts = [
        'deleted_at' => 'date'
    ];

    public function getPrice(): Money
    {
        return Money::USD($this->price * 100);
    }
}
