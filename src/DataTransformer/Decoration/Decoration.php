<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Decoration;

use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Money\Money;

final class Decoration extends AbstractObjectHydrator
{
    public $decoration_type;
    public $code;
    public $name;
    public $price;
    public $location;
    public $is_quantity_based;
    public $auto_insert;

    public function getPrice(): Money
    {
        return Money::USD($this->price);
    }
}
