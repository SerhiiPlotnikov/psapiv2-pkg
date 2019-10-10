<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Price;

use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Money\Currency;
use Money\Money;

final class Price extends AbstractObjectHydrator
{
    public $quantity;
    public $price;
    public $currency_code;

    public function getPrice(): Money
    {
        return new Money($this->price * 100, new Currency($this->currency_code));
    }
}
