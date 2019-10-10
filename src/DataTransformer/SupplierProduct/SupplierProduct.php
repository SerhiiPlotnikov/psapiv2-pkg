<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\SupplierProduct;

use Psapiv2\DataTransformer\Offer\Offer;
use Psapiv2\DataTransformer\Supplier\ShortSupplier;
use Psapiv2\DataTransformer\Variant\VariantCollection;

final class SupplierProduct extends ShortSupplierProduct
{
    public $description;
    public $offer;
    public $minimum_quantity;
    public $created_by;
    public $activated_by;
    public $dimensional_uom;
    public $length;
    public $height;
    public $width;
    public $weight_uom;
    public $weight;
    public $production_time;
    public $is_quoted;
    public $is_for_youth;
    public $quote_expires_at;

    public $created_at;
    public $updated_at;

    protected $hydrates = [
        'supplier' => ShortSupplier::class,
        'offer' => Offer::class,
        'variants' => VariantCollection::class
    ];

    protected $casts = [
        'quote_expires_at' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at'=>'date'
    ];
}
