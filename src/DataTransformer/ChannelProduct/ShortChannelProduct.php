<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\ChannelProduct;

use Psapiv2\DataTransformer\Channel\ShortChannel;
use Psapiv2\DataTransformer\Product;
use Psapiv2\DataTransformer\Variant\VariantCollection;
use Money\Money;
use Psapiv2\DataTransformer\AbstractObjectHydrator;

class ShortChannelProduct extends AbstractObjectHydrator
{
    public $id;
    public $code;
    public $channel;
    public $product;
    public $price;
    public $name;
    public $default_image;
    public $rating;
    public $as_low_as;
    public $deleted_at;
    public $variants;

    protected $casts = [
        'deleted_at' => 'date',
    ];

    protected $hydrates = [
        'channel' => ShortChannel::class,
        'product' => Product::class,
        'variants' => VariantCollection::class,
    ];

    public function getPrice(): Money
    {
        return Money::USD($this->price);
    }
}
