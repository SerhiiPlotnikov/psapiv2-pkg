<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Accessory;

use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Money\Money;

final class Accessory extends AbstractObjectHydrator
{
    public $code;
    public $name;
    public $price;
    public $location;
    public $is_quantity_based;
    public $auto_insert;

    public function getPrice(): Money
    {
        return Money::USD($this->price * 100);
    }
}
