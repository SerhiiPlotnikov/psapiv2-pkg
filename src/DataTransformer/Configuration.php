<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer;

use Psapiv2\DataTransformer\Accessory\AccessoryCollection;
use Psapiv2\DataTransformer\ChannelProduct\ChannelProduct;
use Psapiv2\DataTransformer\Decoration\DecorationCollection;
use Psapiv2\DataTransformer\Service\ServiceCollection;
use Psapiv2\DataTransformer\Variant\Variant;

final class Configuration extends AbstractObjectHydrator
{
    public $id;
    public $channel_product;
    public $variant;
    public $offer;
    public $quantity;
    public $price;
    public $art_text;
    public $art_file;
    public $services;
    public $accessories;
    public $decorations;
    public $customer_notes;
    public $is_youth;
    public $is_apparel;
    public $is_quoted;
    public $quote_expires_at;
    public $created_at;
    public $updated_at;

    protected $casts = [
        'quote_expires_at' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date'
    ];

    protected $hydrates = [
        'channel_product' => ChannelProduct::class,
        'variant' => Variant::class,
        'services' => ServiceCollection::class,
        'accessories' => AccessoryCollection::class,
        'decorations' => DecorationCollection::class
    ];
}
