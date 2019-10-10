<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Offer;

use Psapiv2\DataTransformer\AbstractObjectHydrator;
use Psapiv2\DataTransformer\Price\PriceCollection;

final class Offer extends AbstractObjectHydrator
{
    public $id;
    public $contact;
    public $code;
    public $is_default;
    public $valid_from;
    public $valid_to;
    public $prices;

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date'
    ];
    protected $hydrates = [
        'prices' => PriceCollection::class
    ];
}
