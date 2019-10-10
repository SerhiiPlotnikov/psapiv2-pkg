<?php
declare(strict_types=1);

namespace Psapiv2\DataTransformer\Offer;

use Psapiv2\DataTransformer\AbstractArrayHydrator;

final class OfferCollection extends AbstractArrayHydrator
{
    protected $castsCollectionToType = Offer::class;
}
