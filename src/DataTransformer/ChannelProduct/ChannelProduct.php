<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\ChannelProduct;

use Psapiv2\DataTransformer\Accessory\AccessoryCollection;
use Psapiv2\DataTransformer\Channel\ShortChannel;
use Psapiv2\DataTransformer\Decoration\DecorationCollection;
use Psapiv2\DataTransformer\Offer\OfferCollection;
use Psapiv2\DataTransformer\Product;
use Psapiv2\DataTransformer\Review\ReviewCollection;
use Psapiv2\DataTransformer\Service\ServiceCollection;
use Psapiv2\DataTransformer\Variant\VariantCollection;
use Money\Money;

final class ChannelProduct extends ShortChannelProduct
{
    public $description;
    public $short_description;
    public $is_on_sale;
    public $minimum_quantity;
    public $num_suffix;
    public $created_at;
    public $updated_at;
    public $offers;
    public $reviews;
    public $alt_images;
    public $accessories;
    public $services;
    public $decorations;


    protected $casts = [
        'deleted_at' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date'
    ];

    protected $hydrates = [
        'channel' => ShortChannel::class,
        'product' => Product::class,
        'variants' => VariantCollection::class,
        'offers' => OfferCollection::class,
        'reviews' => ReviewCollection::class,
        'accessories' => AccessoryCollection::class,
        'services' => ServiceCollection::class,
        'decorations' => DecorationCollection::class
    ];
}
