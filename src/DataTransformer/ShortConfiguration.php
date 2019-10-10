<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

use Psapiv2\DataTransformer\ChannelProduct\ChannelProduct;
use Psapiv2\DataTransformer\Offer\Offer;
use Psapiv2\DataTransformer\Variant\Variant;
use Money\Money;

class ShortConfiguration extends AbstractObjectHydrator
{
    public $id;
    public $channel_product;
    public $variant;
    public $offer;
    public $quantity;
    public $price;

    protected $hydrates = [
        'channel_product' => ChannelProduct::class,
        'offer' => Offer::class,
        'variant' => Variant::class
    ];

    public function getPrice(): Money
    {
        return Money::USD($this->price * 100);
    }
}
